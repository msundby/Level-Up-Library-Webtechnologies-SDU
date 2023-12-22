async function getReviews() {
    const fetchData = await fetch('./review');
    const data = await fetchData.json();
    const other_reviews = document.getElementById("other_reviews");

    console.log(data);

    data.forEach((review) => {
        console.log(review);
        const reviewDiv = document.createElement('div')
        reviewDiv.className = "review"
        const reviewTitle = document.createElement("h3");
        reviewTitle.textContent = review.title;
        reviewDiv.appendChild(reviewTitle);
        const reviewContent = document.createElement("p");
        reviewContent.textContent = review.content;
        reviewDiv.appendChild(reviewContent);
        const reviewMetaData = document.createElement("p");
        const reviewMetaDataString = "| Written by: " + review.name + " | Platform: " + review.platform + " | Rating: " + review.rating + " |";
        reviewMetaData.textContent = reviewMetaDataString;
        reviewMetaData.className = "metaData";
        reviewDiv.appendChild(reviewMetaData);
        other_reviews.appendChild(reviewDiv);
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


const textarea = document.getElementById('content');       // Extension
const characterCounter = document.getElementById('characterCounter');    // Extension
textarea.addEventListener("input", function() {                 // Extension
    const currentChars = textarea.value.length;                                  // Extension
    characterCounter.textContent = `${currentChars}/255 characters`;                    // Extension
    if (currentChars === 255){                                                   // Extension
        characterCounter.style.color = "red";                                           // Extension
    }                                                                            // Extension
    else {                                                                       // Extension
        characterCounter.style.color = "black";                                         // Extension
    }                                                                            // Extension
})                                                                               // Extension

