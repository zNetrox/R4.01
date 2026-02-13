document.addEventListener('DOMContentLoaded', () => {
    // search
    const searchButton = document.getElementById('searchButton');
    const searchInput = document.getElementById('searchString');

    searchButton.addEventListener('click', () => {
        const query = searchInput.value.trim();
        if (query !== "") {
            const baseUrl = searchButton.getAttribute('data-url');
            const encodedQuery = encodeURIComponent(query);
            window.location.href = baseUrl + '/' + encodedQuery;
        }
    });

});
