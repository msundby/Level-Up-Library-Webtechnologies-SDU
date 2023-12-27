const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

function deleteReview(reviewId) {
    fetch(/review/ + reviewId, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
    })
        .then(response => {
            if (response.ok) {
                document.getElementById(reviewId + "div").remove();
                location.reload();
                console.log(`Review with ID ${reviewId} deleted successfully.`);
            } else {

                console.error('Error deleting review:', response.statusText);
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
}

function editReview(reviewId) {
    const reviewDiv = document.getElementById(reviewId + "div");
    const reviewChildren = reviewDiv.children;

    let counter = 0;
    console.log(reviewChildren)
    for (const child of reviewChildren) {

        if (child.className === "editable") {
            console.log(child)
            counter += 1;
            if (counter % 2 == 0) {
                const text = child.textContent;
                const txtElement = document.createElement("textarea");
                txtElement.value = text;
                txtElement.className = "edited" + counter;
                child.replaceWith(txtElement);
            }
            const text = child.textContent;
            const txtElement = document.createElement("input");
            txtElement.value = text;
            txtElement.className = "edited" + counter;
            child.replaceWith(txtElement);

        }
    }

    const saveButton = document.createElement("button");
    saveButton.textContent = "Save";
    saveButton.className = "save";
    reviewDiv.appendChild(saveButton);

    const gameImg = document.getElementById(reviewId + "img");
    gameImg.style.display = "none";

    const editButton = document.getElementById(reviewId + "edit");
    editButton.style.display = "none";

    const deleteButton = document.getElementById(reviewId + "delete");
    deleteButton.style.display = "none";

    saveButton.addEventListener("click", function () {
        let title = document.querySelector(".edited1").value;
        let content = document.querySelector(".edited2").value;
        let ratingInput = document.querySelector(".edited3");
        let rating = ratingInput.value;

        try {
            let num = parseFloat(rating);

            if (isNaN(num) || num < 1 || num > 5 || num % 1 !== 0) {
                throw new Error("Rating must be an integer between 1 and 5");
            }


            rating = parseInt(rating);

            fetch(`/review/${reviewId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({reviewId, title, content, rating}),
            })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    } else {
                        console.error('Error updating review:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                });

        } catch (error) {

            alert(error.message);
            return;
        }
    });
}



