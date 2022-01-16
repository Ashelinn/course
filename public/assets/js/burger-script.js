let burger_menu = document.querySelector('.burger-menu');
console.log('burger_menu- ',burger_menu);

burger_menu.addEventListener('click', showMenu);

function showMenu() {
    let burger = document.querySelector('.burger-menu');
    console.log(burger.className);
    let menu = document.querySelector('.header-main');

    if(menu.classList.contains('active')) {
        burger.classList.remove('active');
        menu.classList.remove('active');
    }
    else {
        burger.classList.add('active');
        menu.classList.add('active');
    }
}