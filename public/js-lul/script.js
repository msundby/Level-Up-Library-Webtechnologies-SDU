function toggleMenu() {
    const menuLinks = document.querySelector('.menu-links');
    const hamburger = document.querySelector('.hamburger-icon');
    hamburger.classList.toggle('open');
    menuLinks.classList.toggle('open');
}
