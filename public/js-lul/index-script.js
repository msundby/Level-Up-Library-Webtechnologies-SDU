const gridItems = document.querySelectorAll('.grid-item');

gridItems.forEach((item) => {
    item.addEventListener('mouseenter', () => {
        item.querySelector('.overlay').style.opacity = 1;
        item.querySelector('img').style.filter = 'brightness(0.7)';
    });

    item.addEventListener('mouseleave', () => {
        item.querySelector('.overlay').style.opacity = 0;
        item.querySelector('img').style.filter = 'brightness(1)';
    });
});
