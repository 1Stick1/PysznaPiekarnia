let form_link = document.getElementById('form-link');
let form = document.getElementById('form');
let form_cross = document.getElementById('form-cross');

let pswd_link = document.getElementById('change-pswd-link');
let pswd = document.getElementById('pswd');
let pswd_cross = document.getElementById('pswd-cross');


let dark1 = document.getElementById('dark-background');

if(localStorage.getItem('popupOpen') === 'true'){
    pswd.classList.add('visible');
    dark.classList.toggle('visible');
    document.body.classList.add('no-scroll');
}


form_link.addEventListener('click', function(){
    form_cross.classList.toggle('visible');
    form.classList.toggle('visible');
    dark1.classList.toggle('visible')
    document.body.classList.toggle('no-scroll');
});
form_cross.addEventListener('click', function(){
    form.classList.toggle('visible');
    dark1.classList.toggle('visible');
    document.body.classList.toggle('no-scroll');
});

pswd_link.addEventListener('click', function(){
    pswd.classList.toggle('visible');
    pswd_cross.classList.toggle('visible');
    dark1.classList.toggle('visible')
    document.body.classList.toggle('no-scroll');
    localStorage.setItem('popupOpen', 'true');
});

pswd_cross.addEventListener('click', function(){
    pswd.classList.toggle('visible');
    dark1.classList.toggle('visible');
    document.body.classList.toggle('no-scroll');
    localStorage.setItem('popupOpen', 'false');
});



const password = document.getElementById('new-password');
const confirmPassword = document.getElementById('password_confirmation');
const error = document.getElementById('error');
const button = document.getElementById('button');

function checkPasswords() {
    if (password.value !== confirmPassword.value) {
        error.textContent = "Password not the same";
        error.style.display = "block";
        button.disabled = true;
    } else if(password.value.length <= 8){
        error.textContent = "Password too short";
        error.style.display = "block";
        button.disabled = true;
    }else{
        error.style.display = "none";
        button.disabled = false;
    }
}
password.addEventListener('input', checkPasswords);
confirmPassword.addEventListener('input', checkPasswords);