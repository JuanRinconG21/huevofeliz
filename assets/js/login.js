const signUp = document.getElementById('signup');
const signIn = document.getElementById('signin');
const container = document.querySelector('.container');

signIn.addEventListener('click', ()=> {
    container.classList.add('active');
});

signUp.addEventListener('click', ()=> {
    container.classList.add('active');
});
