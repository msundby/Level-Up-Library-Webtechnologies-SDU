let searchableGames = [];
const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;


async function getAllGames(){
    const response = await fetch('/games', {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
    });
  const games = await response.json();
  return games;
}

async function createGameElements(){
    const fetchedGames = await getAllGames();
    const allGames = document.getElementById("allgames");
    const loading = document.getElementById("loading");
    loading.style.display = "none";

    fetchedGames.forEach((game) => {
        const gameContainer = document.createElement('article');
        gameContainer.id = 'game';

        gameContainer.addEventListener('click', () => {
            window.location.href = `/gamepage/${game.name}`;
        });

        const image = document.createElement('img')
        image.id = 'img';
        const name = document.createElement('h3');
        name.id = 'featured-title';
        const description = document.createElement('p');
        description.id = 'featured-snippet';

        const rating = document.createElement('div');
        rating.id = 'rating';

        image.src = game['image_link'];
        name.textContent = game.name;
        description.textContent = game.description;
        const roundedRating = parseFloat(game.aggregate_rating).toFixed(2);
        rating.textContent = roundedRating + "/5";

        gameContainer.className = "game_container"

        gameContainer.appendChild(image);
        gameContainer.appendChild(name);
        gameContainer.appendChild(description)
        gameContainer.appendChild(rating)
        allGames.appendChild(gameContainer);
    })
    console.log(fetchedGames);


}

getGames().then(createGameElements);

async function getGames() {
    const fetchData = await fetch('/games', {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
    });
    const data = await fetchData.json();

    data.forEach((game) => {
        searchableGames.push(game);
    })
    console.log(searchableGames);
}

function displaySearchedGames(searchGames) {
    const allGames = document.getElementById("allgames");
    allGames.innerHTML = '';
    searchGames.forEach((game) => {
        const gameContainer = document.createElement('article');
        gameContainer.id = 'game';

        gameContainer.addEventListener('click', () => {
            window.location.href = `/gamepage/${game.name}`;
        });

        const image = document.createElement('img')
        image.id = 'img';
        const name = document.createElement('h3');
        name.id = 'featured-title';
        const description = document.createElement('p');
        description.id = 'featured-snippet';
        const rating = document.createElement('div');
        rating.id = 'rating';

        image.src = game['image_link'];
        const roundedRating = parseFloat(game.aggregate_rating).toFixed(2);
        name.textContent = game.name;
        description.textContent = game.description;
        rating.textContent = roundedRating + "/5";

        gameContainer.className = "game_container"

        gameContainer.appendChild(image);
        gameContainer.appendChild(name);
        gameContainer.appendChild(description)
        gameContainer.appendChild(rating)
        allGames.appendChild(gameContainer);
    })

}

const searchbar = document.getElementById('searchbar');
searchbar.addEventListener('keyup', () => {
    let foundgamesByName = searchableGames.filter(e => e.name.toUpperCase().includes(searchbar.value.toUpperCase()));
    let foundgamesByTag = searchableGames.filter(e => e.tag_name.toUpperCase().includes(searchbar.value.toUpperCase()));
    let foundGames = foundgamesByTag
    foundgamesByName.forEach((game) => {
        if (!foundGames.includes(game)) {
            foundGames.push(game);
        }
    })
    console.log(foundGames);
    displaySearchedGames(foundGames);
});
