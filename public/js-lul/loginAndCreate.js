function closeLogin() {
    const loginForm = document.getElementById('loginForm');
    loginForm.style.display = 'none';

    window.history.back();
}


function closeCreate() {
    const createForm = document.getElementById('createForm');
    createForm.style.display = 'none';

    window.history.back();
}

