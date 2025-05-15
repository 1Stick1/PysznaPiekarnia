let login = document.getElementById('login');
let login2 = document.getElementById('login2');
let registration = document.getElementById('registration');

let login_form = document.getElementById('login-form');
let registration_form = document.getElementById('registration-form');

let login_cross = document.getElementById('login-cross');
let registration_cross = document.getElementById('registration-cross');


let dark = document.getElementById('dark-background');
if(localStorage.getItem('popupOpen') === 'true'){
    registration_form.classList.add('visible');
    dark.classList.toggle('visible');
    document.body.classList.add('no-scroll');
}
if(localStorage.getItem('loginOpen') === 'true'){
    login_form.classList.add('visible');
    dark.classList.add('visible');
    document.body.classList.add('no-scroll');
}

function open_login(){
    login_form.classList.toggle('visible');
    dark.classList.add('visible');
    registration_form.classList.remove('visible');
    localStorage.setItem('loginOpen', 'true');
    localStorage.setItem('popupOpen', 'false');
    document.body.classList.add('no-scroll');
}
login.addEventListener('click', open_login);
login2.addEventListener('click', open_login);

registration.addEventListener('click', function(){
    login_form.classList.toggle('visible');
    dark.classList.add('visible');
    registration_form.classList.toggle('visible');
    localStorage.setItem('popupOpen', 'true');
    localStorage.setItem('loginOpen', 'false');
});

function close_forms(){
    dark.classList.remove('visible');
    document.body.classList.remove('no-scroll');
    registration_form.classList.remove('visible');
    login_form.classList.remove('visible');
    localStorage.setItem('popupOpen', 'false');
    localStorage.setItem('loginOpen', 'false');
}

login_cross.addEventListener('click', close_forms);
registration_cross.addEventListener('click', close_forms);


