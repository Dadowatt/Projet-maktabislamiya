document.getElementById('load-more').addEventListener('click', function () {
        let button = this;
        let offset = parseInt(button.dataset.offset);

        fetch(`/livres/load-more?offset=${offset}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('livre-container').insertAdjacentHTML('beforeend', html);
                button.dataset.offset = offset + 4;
            });
});

