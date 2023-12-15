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

async function getAllGames(){
    const response = await fetch('/games');
    const games = await response.json();
    return games;
}

async function getAllGamesSortByRating(){

    const response = await fetch('/games');
    const games = await response.json();
    games.sort((a, b) => parseFloat(b.aggregate_rating) - parseFloat(a.aggregate_rating));

    const sortedArray = games.slice(0,8);

    return sortedArray;
}

async function getAllGamesSortByNewest(){

    const response = await fetch('/games');
    const games = await response.json();
    games.sort((a, b) => new Date(b.release_date) - new Date(a.release_date));

    const sortedArray = games.slice(0,8);

    return sortedArray;
}

async function createGameElements(divName) {
    let sortedGames = [];
    if(divName === "carousel_container"){
        sortedGames = await getAllGamesSortByRating();
    } else if (divName === "gridGamesNewestGames"){
        sortedGames = await getAllGamesSortByNewest();
    }

    const gridContainer = document.getElementById(divName);


    sortedGames.forEach((game => {

        const gridItem = document.createElement("div");
        gridItem.className = 'grid-item';

        gridItem.addEventListener('click', () => {
            // Redirect to the game page with the specific ID
            window.location.href = `/gamepage/${game.name}`;
        });

        const imageLink = document.createElement("img")
        const overlay = document.createElement("div");
        overlay.className = 'overlay';
        const overlayItem = document.createElement("div");
        overlayItem.className = 'overlay-content';
        const imageTitle = document.createElement('h3');
        imageTitle.className = 'image-title';
        const ratingGrid = document.createElement('div');
        ratingGrid.className = 'rating-grid';


        imageLink.src = game['image_link'];
        imageTitle.textContent = game.name;
        const roundedRating = parseFloat(game.aggregate_rating).toFixed(2);
        ratingGrid.textContent = roundedRating + "/5";

        gridContainer.className = 'carousel_container';


        gridItem.appendChild(imageLink);
        overlayItem.appendChild(imageTitle);
        overlayItem.appendChild(ratingGrid);
        overlay.appendChild(overlayItem);
        gridItem.appendChild(overlay);
        gridContainer.appendChild(gridItem);
    }));
}

createGameElements("carousel_container");
createGameElements("gridGamesNewestGames");
