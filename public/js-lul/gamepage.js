//TODO: THIS SHOULD REALLY BE DONE IN THE DATABASE, TO OPTIMIZE PERFORMANCE
//THIS CODE SHOULD ONLY BE ENABLED WHEN A FIX ON FREEZE WHEN THERE ARE LESS THAN 3 REVIEWS HAS BEEN FIXED

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

 function displayRandomReviews() {
    const user_reviews = document.getElementById('user_reviews');
    const allReviews = getReviews();
    const selectedReviews = getRandomReviews(allReviews);
    user_reviews.innerHTML = "";
    selectedReviews.forEach((i) => {
        const reviewContent = document.createElement("li");
        reviewContent.textContent = allReviews[i].content;
        user_reviews.appendChild(reviewContent);
    })

}

displayRandomReviews();
