document.querySelectorAll('.dropdown-btn').forEach(function (button) {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        var dropdownContent = this.nextElementSibling;
        dropdownContent.classList.toggle('show');
    });
});

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('.dropdown-btn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};

$(document).ready(function () {
    $('#example').DataTable();
});

function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toLowerCase();
    table = document.getElementById("tableData");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
            var cell = td[j];
            if (cell) {
                txtValue = cell.textContent || cell.innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";

                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

}
