async function getReviews() {
    const gameName = document.getElementById('gameName').textContent;
    const fetchData = await fetch(`${gameName}/review`);
    const data = await fetchData.json();
    return data;
}
getReviews();
function getRandomReviews(array) {
    const randomReviews = [];

    while (randomReviews.length < 3) {
        const randomReview = Math.floor(Math.random() * array.length);

        if (!randomReviews.includes(randomReview)) {
            randomReviews.push(randomReview);
        }
    }

    return randomReviews;
}

async function displayRandomReviews() {
    const user_reviews = document.getElementById('user_reviews');
    const allReviews = await getReviews();
    const selectedReviews = getRandomReviews(allReviews);
    user_reviews.innerHTML = "";
    selectedReviews.forEach((i) => {
        const reviewContent = document.createElement("li");
        reviewContent.textContent = allReviews[i].content;
        user_reviews.appendChild(reviewContent);
    })

}

displayRandomReviews();
