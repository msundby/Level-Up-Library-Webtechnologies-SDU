async function test () {
    const response = await fetch("http://127.0.0.1:8000/review");
    const data = await response.json();
    const reviewDiv = document.getElementById('other_reviews');
    console.log(data);
    data.forEach((e) => {
        console.log(e.description);
        const reviewDesc = document.createElement('p');
        reviewDesc.textContent = e.description;
        reviewDiv.appendChild(reviewDesc);
    })
}

test();

let myForm = document.getElementById('submit_form');

myForm.addEventListener("submit", (e) => {
    //e.preventDefault(); - Fucker redirecting op
    let title = document.getElementById("title");
    let platform = document.getElementById("platform");
    let review_content = document.getElementById('content');
    let score = document.getElementById('score');
    let review = JSON.stringify([title.value, platform.value, review_content.value.trim(), score.value])
    console.log(review);
    //console.log(title.value, platform.value, review_content.value, score.value);
})