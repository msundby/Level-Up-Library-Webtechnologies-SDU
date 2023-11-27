let searchableGames = [];

function toggleMenu() {
    const menuLinks = document.querySelector('.menu-links');
    const hamburger = document.querySelector('.hamburger-icon');
    hamburger.classList.toggle('open');
    menuLinks.classList.toggle('open');
}

async function getGames() {
    const fetchData = await fetch('http://localhost:8000/games');
    const data = await fetchData.json();

    data.forEach((game) => {
        searchableGames.push(game);
    })
    console.log(searchableGames);
}


const searchbar = document.getElementById('searchbar');
searchbar.addEventListener('keyup', () => {
    let foundgames = searchableGames.filter(e => e.name.toUpperCase().includes(searchbar.value.toUpperCase()));
    console.log(foundgames);
});

getGames();
