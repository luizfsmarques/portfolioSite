var btnIncluir = document.querySelector("#incluir");
var btnExcluir = document.querySelector("#alterar");

var incluirProjetos = document.querySelector(".incluir-projetos");
var excluirProjetos = document.querySelector(".alterar-projetos");


btnIncluir.addEventListener("click", function(){

    incluirProjetos.classList.toggle("mostra-incluir-projetos");
    
});

btnExcluir.addEventListener("click", function(){

    excluirProjetos.classList.toggle("mostra-excluir-projetos");
       
});


