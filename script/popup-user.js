let user_link = document.getElementById('user-menu__link');
let user_menu = document.getElementById('user-menu');
user_link.addEventListener('click', function(){
    user_menu.classList.toggle('active');
});