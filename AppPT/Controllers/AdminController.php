<?php

namespace AppPT\Controllers;

use AppPT\Controllers\Controller;
use AppPT\Controllers\ProjetosController;
use AppPT\Controllers\ContatoController;


class AdminController extends Controller
{   
    
    public function __construct()
    {
        $projetosController = new ProjetosController();
        $this->setViewVar('projetosAdmin', $projetosController->listagem_projetos_admin());

        $contatoController = new ContatoController();
        $this->setViewVar('contatos',$contatoController->listar());
 
    } 

    public function exibe()
    {   
        $this->render('admin');
    }

}