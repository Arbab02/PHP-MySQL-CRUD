document.addEventListener('DOMContentLoaded', function() {
    var searchInput = document.getElementById('searchInput');
    var rows = document.querySelectorAll('table tr');

    searchInput.addEventListener('input', function() {
        var searchText = this.value.toLowerCase();

        rows.forEach(function(row) {
            var name = row.cells[0].textContent.toLowerCase();

            if (name.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
