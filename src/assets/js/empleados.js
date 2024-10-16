if (document.getElementById("pagination-table", ) && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#pagination-table", {
        paging: true,
        perPage: 10,
        perPageSelect: [5, 10, 15, 20, 25],
        sortable: false,

    });
}

document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('defaultModalButton').click();
});


// npx tailwindcss -i ./src/css/input.css -o ./src/css/output.css --watch



