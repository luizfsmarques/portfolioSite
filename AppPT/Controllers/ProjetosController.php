<?php

namespace AppPT\Controllers;

use AppPT\Controllers\Controller;
use AppPT\Models\DAO\ProjetosDAO;
use AppPT\Models\Entidades\Projetos;



class ProjetosController extends Controller
{
    private $diretorioImagem = "C:/xampp/htdocs/public_html/public/img/projetos/";

    public function salvar() //Depois colocar todos os outros detalhes como session e exceptions
    {   
        $Projetos = new Projetos();
        $Projetos->setId(null);
        $Projetos->setTipo($_POST['tipo']);
        $Projetos->setNome($_POST['nome']);
        $Projetos->setTecnologia($_POST['tecnologia']);
        $Projetos->setImagem($_FILES['imagem']['name']);
        $Projetos->setDescricao($_POST['descricao']);
        $Projetos->setLink($_POST['link']);    
        
        move_uploaded_file($_FILES['imagem']['tmp_name'],$this->diretorioImagem.$_FILES['imagem']['name']);

        $projetosDAO = new ProjetosDAO();
        $projetosDAO->salvar($Projetos); 

        $this->render('sucesso/sucessoInterno');
   
    }

    public function listagem_projetos_pessoais()
    {   
        $projetosDAO = new ProjetosDAO();


        $this->setViewVar('projetos', $projetosDAO->listar());

        $this->render('projetospes');
    }

    public function listagem_projetos_profissionais()
    {
        $projetosDAO = new ProjetosDAO();



        $this->setViewVar('projetos', $projetosDAO->listar());

        $this->render('projetospro');
    }

    public function listagem_projetos_admin()
    {
        $projetosDAO = new ProjetosDAO();


        $listagem = $projetosDAO->listar();

        return $listagem;
    }


    public function edicao($params)
    {
        $id= $params;

        $projetosDAO = new ProjetosDAO();

        $this->setViewVar('projetosEdicao', $projetosDAO->listar($id));

        $this->render('projetos/edicaoAdmin');
    }

    public function atualizar()
    {
        $projetos = new Projetos();
        
        $projetos->setId($_POST['id']);
        $projetos->setTipo($_POST['tipo']);
        $projetos->setNome($_POST['nome']);
        $projetos->setTecnologia($_POST['tecnologia']);
        $projetos->setImagem($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'],$this->diretorioImagem.$_FILES['imagem']['name']);
        $projetos->setDescricao($_POST['descricao']);
        $projetos->setLink($_POST['link']);  

        $projetosDAO = new ProjetosDAO();
        $projetosDAO->atualizar($projetos);

        $this->render('sucesso/sucessoInterno');
    }

    public function exclusao($params)
    {
        $id = $params;

        $projetosDAO = new ProjetosDAO();
        $this->setViewVar('projetosExclusao', $projetosDAO->listar($id));

        $this->render('projetos/exclusaoAdmin');
    }
    
    public function excluir()
    {
        $projetos = new Projetos();
        $projetos->setId($_POST['id']);

        $projetosDAO = new ProjetosDAO();
        $projetosDAO->excluir($projetos);

        $this->render('sucesso/sucessoInterno');
    }

}

