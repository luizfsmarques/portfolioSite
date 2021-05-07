
var btnMenu = document.querySelector(".btn-menu");
var menuEscondido = document.querySelector(".menu-escondido");

function toggleMenu(){

    menuEscondido.classList.toggle("mostra-menu");
}

btnMenu.addEventListener("click", toggleMenu);



