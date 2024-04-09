document.addEventListener('DOMContentLoaded', () => {
    // Funcionalidad del menú para cargar más elementos
    const loadMoreBtn = document.querySelector('#load-more');
    let currentItem = 8;

    loadMoreBtn.onclick = () => {
        const boxes = document.querySelectorAll('.product-row');
        for (let i = currentItem; i < currentItem + 4; i++) {
            if (boxes[i]) {
                boxes[i].style.display = 'block';
            }
        }
        currentItem += 4;
        if (currentItem >= boxes.length) {
            loadMoreBtn.style.display = 'none';
        }
    };
});
