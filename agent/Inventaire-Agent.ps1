# Agent d'inventaire TechStock : collecte les infos du poste et les envoie à l'API.
# À lancer en tant que SYSTEM (tâche planifiée / GPO) pour lire tous les logiciels.

$ErrorActionPreference = 'Stop'

$ApiUrl = 'http://10.29.160.9/html/Projet_TechStock/public/api/inventory.php'  # à adapter
$Token  = '16bed73876ac790d0ddc8789fedad42644dfb71c1fae12e6061082dde44b61e5'

$cs   = Get-CimInstance Win32_ComputerSystem
$os   = Get-CimInstance Win32_OperatingSystem
$bios = Get-CimInstance Win32_BIOS
$cpu  = (Get-CimInstance Win32_Processor | Select-Object -First 1).Name

# IP de l'interface qui porte la passerelle par défaut
$ip = (Get-NetIPConfiguration | Where-Object { $_.IPv4DefaultGateway } |
       Select-Object -First 1).IPv4Address.IPAddress

# Disques fixes : "C: 120.5 Go libres / 475.9 Go ; D: ..."
$disques = Get-CimInstance Win32_LogicalDisk -Filter 'DriveType=3' | ForEach-Object {
    '{0} {1} Go libres / {2} Go' -f $_.DeviceID,
        [math]::Round($_.FreeSpace / 1GB, 1), [math]::Round($_.Size / 1GB, 1)
}

# Logiciels installés (64 bits + 32 bits)
$paths = 'HKLM:\Software\Microsoft\Windows\CurrentVersion\Uninstall\*',
         'HKLM:\Software\WOW6432Node\Microsoft\Windows\CurrentVersion\Uninstall\*'
$softwares = @(Get-ItemProperty $paths -ErrorAction SilentlyContinue |
    Where-Object { $_.DisplayName } |
    Select-Object @{n='name';e={$_.DisplayName}},
                  @{n='version';e={$_.DisplayVersion}},
                  @{n='publisher';e={$_.Publisher}} |
    Sort-Object name, version -Unique)

$payload = [ordered]@{
    hostname         = $env:COMPUTERNAME
    fabricant        = $cs.Manufacturer
    modele           = $cs.Model
    numero_serie     = $bios.SerialNumber
    adresse_ip       = $ip
    os_nom           = $os.Caption
    os_version       = $os.BuildNumber
    processeur       = $cpu
    memoire_ram_go   = [math]::Round($cs.TotalPhysicalMemory / 1GB, 1)
    disques_libre_go = ($disques -join ' ; ')
    softwares        = $softwares
}

$json = $payload | ConvertTo-Json -Depth 4
$body = [Text.Encoding]::UTF8.GetBytes($json)

Invoke-RestMethod -Uri $ApiUrl -Method Post -Body $body `
    -ContentType 'application/json; charset=utf-8' `
    -Headers @{ 'X-API-Token' = $Token } -TimeoutSec 30
