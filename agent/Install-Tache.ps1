#Requires -RunAsAdministrator
# Copie l'agent sur le poste et crée une tâche planifiée quotidienne (compte SYSTEM).
$Dest = 'C:\ProgramData\TechStock'
New-Item -ItemType Directory -Force $Dest | Out-Null
Copy-Item "$PSScriptRoot\Inventaire-Agent.ps1" $Dest -Force

$action    = New-ScheduledTaskAction -Execute 'powershell.exe' `
             -Argument "-NoProfile -ExecutionPolicy Bypass -File `"$Dest\Inventaire-Agent.ps1`""
$trigger   = New-ScheduledTaskTrigger -Daily -At 12:30
$principal = New-ScheduledTaskPrincipal -UserId 'SYSTEM' -RunLevel Highest
$settings  = New-ScheduledTaskSettingsSet -StartWhenAvailable
Register-ScheduledTask -TaskName 'TechStock Inventaire' -Action $action `
    -Trigger $trigger -Principal $principal -Settings $settings -Force | Out-Null
Start-ScheduledTask -TaskName 'TechStock Inventaire'
Write-Host 'Tâche installée et lancée une première fois.'
