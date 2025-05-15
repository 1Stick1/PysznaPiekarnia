const password = document.getElementById('password');
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