const container = document.querySelector('.container');
const signupbutton = document.querySelector('.signup-selection header');
const loginbutton = document.querySelector('.login-selection header');

loginbutton.addEventListener('click', () => {
    container.classList.add('active');
});

signupbutton.addEventListener('click', () => {
    container.classList.remove('active');
});
