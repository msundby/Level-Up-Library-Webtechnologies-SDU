function deleteGame(game_id) {
    fetch(/game/ + game_id, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
    })
    .then(response => {
        if (response.ok) {
            document.getElementById(game_id + "div").remove();
        }
    });
}

function editGame(game_id) {
    const game = document.getElementById(game_id+'div');

    const currentImage = game.querySelector('.game_image').src;
    const currentName = game.querySelector('.game_name').textContent;
    const currentDescription = game.querySelector('.game_description').textContent;
    const currentReleaseDate = game.querySelector('.game_release').textContent;
    game.innerHTML = "";

    const inputName = document.createElement('input');
    inputName.id = "updatedName"
    inputName.type = 'text';
    inputName.value = currentName;
    game.appendChild(inputName);

    const inputDescription = document.createElement('textarea');
    inputDescription.id = "updatedDescription"
    inputDescription.value = currentDescription;
    game.appendChild(inputDescription);

    const inputImageLink = document.createElement('input');
    inputImageLink.id = "updatedImageLink"
    inputImageLink.type = 'text';
    inputImageLink.value = currentImage;
    game.appendChild(inputImageLink);

    const inputReleaseDate = document.createElement('input');
    inputReleaseDate.id = "updatedReleaseDate"
    inputReleaseDate.type = 'text';
    inputReleaseDate.value = currentReleaseDate;
    game.appendChild(inputReleaseDate);

    const saveButton = document.createElement('button');
    saveButton.innerText = 'Save Changes';
    saveButton.addEventListener('click', function() {
        const updatedImage = document.getElementById('updatedImageLink').value;
        const updatedName = document.getElementById('updatedName').value;
        const updatedDescription = document.getElementById('updatedDescription').value;
        const updatedReleaseDate = document.getElementById('updatedReleaseDate').value;
        console.log(JSON.stringify({
            image_link: updatedImage,
            name: updatedName,
            description: updatedDescription,
            release_date: updatedReleaseDate
        }));
        fetch(/game/ + game_id, {

            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                image_link: updatedImage,
                name: updatedName,
                description: updatedDescription,
                release_date: updatedReleaseDate
            })
        })
            .then(response => {
                if(response.ok) {
                    location.reload();
                }
            });
    });
    game.appendChild(saveButton);

    const discardButton = document.createElement('button');
    discardButton.innerText = 'Discard Changes';
    discardButton.addEventListener('click', function() {
        location.reload();
    });
    game.appendChild(discardButton);
}

document.getElementById('create_game').addEventListener('click', function() {
    document.getElementById('game_form').style.display = 'block';
});

document.getElementById('discard').addEventListener('click', function() {
    document.getElementById('game_form').style.display = 'none';
});

document.getElementById('game_form').addEventListener('submit', function() {
    this.style.display = 'none';
});
