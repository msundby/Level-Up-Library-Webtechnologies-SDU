//TODO: THIS SHOULD REALLY BE DONE IN THE DATABASE, TO OPTIMIZE PERFORMANCE
//Fixed the freeze! which i gloriously introduced myself

async function getReviews() {
    const gameName = document.getElementById('gameName').textContent;
    const fetchData = await fetch(`${gameName}/review`);
    const data = await fetchData.json();
    return data;
}
getReviews();
function getRandomReviews(array) {
    const randomReviews = [];
    while (randomReviews.length < Math.min(3, array.length)) {
        const randomReview = Math.floor(Math.random() * array.length);

        if (!randomReviews.includes(randomReview)) {
            randomReviews.push(randomReview);
        }
    }

    return randomReviews;
}

//TODO: Add different event on review length 0
 async function displayRandomReviews() {
    const user_reviews = document.getElementById('user_reviews');
    const allReviews = await getReviews();
    const selectedReviews = getRandomReviews(allReviews);
    user_reviews.innerHTML = "";
    selectedReviews.forEach((i) => {
        const reviewList = document.createElement("li");
        const reviewContent = document.createElement("p");
        const reviewRating = document.createElement("p");
        reviewList.className = "review_content";
        reviewContent.textContent = allReviews[i].content;
        reviewRating.textContent = "Rating: " + allReviews[i].rating + "/5";
        reviewList.appendChild(reviewContent);
        reviewList.appendChild(reviewRating);
        user_reviews.appendChild(reviewList);
    })

}

displayRandomReviews();
