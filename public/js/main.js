$(document).ready(function () {
    const dtOptions = {
        language: {
            search: "Rechercher :",
            lengthMenu: "Afficher _MENU_ entrées",
            info: "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
            infoEmpty: "Aucune donnée disponible",
            zeroRecords: "Aucun résultat trouvé",
            paginate: {
                first: "Premier",
                last: "Dernier",
                next: "Suivant",
                previous: "Précédent"
            }
        },
        pageLength: 10
    };

    if ($('#computersTable').length) {
        $('#computersTable').DataTable(dtOptions);
    }
    if ($('#softwaresTable').length) {
        $('#softwaresTable').DataTable(dtOptions);
    }
    if ($('#inventoryTable').length) {
        $('#inventoryTable').DataTable(dtOptions);
    }
});