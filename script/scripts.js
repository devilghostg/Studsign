function showForm(formId) {
    const formElement = document.querySelector('.form');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const tabs = document.querySelectorAll('.tab');
    
    loginForm.classList.remove('active');
    signupForm.classList.remove('active');
    tabs.forEach(tab => tab.classList.remove('active'));

    if (formId === 'signup') {
        signupForm.classList.add('active');
        tabs[0].classList.add('active');
        formElement.classList.add('signup-active');
    } else {
        loginForm.classList.add('active');
        tabs[1].classList.add('active');
        formElement.classList.remove('signup-active');
    }
}
