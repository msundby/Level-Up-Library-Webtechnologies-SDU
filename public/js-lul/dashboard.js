// Retrieve the CSRF token from the meta tag
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
                // Assuming successful deletion, you can handle the UI changes or redirects here
                console.log(`Review with ID ${reviewId} deleted successfully.`);
            } else {
                // Handle errors here
                console.error('Error deleting review:', response.statusText);
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });



}
