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

$(document).ready(function() {
    // Show the success message
    var successMessage = $('#success-message');
    if (successMessage.length) {
        successMessage.addClass('show');
        // Hide the message after 5 seconds
        setTimeout(function() {
            successMessage.removeClass('show');
        }, 5000);
    }
});

