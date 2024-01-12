//Pesquisa de conteúdo
document.addEventListener("DOMContentLoaded", function () {
    var searchInput = document.getElementById("searchInput");

    if (searchInput) {
        searchInput.addEventListener("input", function () {
            var searchTerm = searchInput.value.toLowerCase();
            var elements = document.querySelectorAll('.searchable');
            elements.forEach(function (element) {
                var text = element.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    element.style.display = "table-row";
                } else {
                    element.style.display = "none";
                }
            });
        });
    } else {
        console.error("Elemento de input de pesquisa não encontrado.");
    }
});