async function getReviews() {
    const fetchData = await fetch('http://127.0.0.1:8000/review');
    const data = await fetchData.json();
    const reviewDiv = document.getElementById("other_reviews");
    console.log(data);

    data.forEach((review) => {
        console.log(review);
        const reviewTitle = document.createElement("p");
        reviewTitle.textContent = review.title;
        reviewDiv.appendChild(reviewTitle);
    })

}
getReviews();
const myForm= document.getElementById("submit_form");
    myForm.addEventListener("submit", (e) => {
    const title = document.getElementById("title");
    const platform = document.getElementById("platform");
    const content = document.getElementById("content");
    const rating = document.getElementById("rating");
    const review = JSON.stringify([title.value.trim(), platform.value, content.value.trim(), rating.value]);
    console.log(review)
})

