var bandeirasIdiomas = document.querySelector('.bandeiras-idiomas');
var escolhaIdiomas = document.querySelector('.escolha-idioma');

function toggleFormIdiomas()
{
    escolhaIdiomas.classList.toggle('mostra-escolha-idioma');
}

bandeirasIdiomas.addEventListener('click',toggleFormIdiomas);