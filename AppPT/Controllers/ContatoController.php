<?php

namespace AppPT\Controllers;

use AppPT\Controllers\Controller;
use AppPT\Models\Entidades\Contato;
use AppPT\Models\DAO\ContatoDAO;


class ContatoController extends Controller
{

    public function exibe()
    {
        $this->render('contatoView');
    }

    public function salvar()
    {
        $contato = new Contato();
        $contato->setId(null);
        $contato->setAssunto($_POST['assunto']);
        $contato->setNome($_POST['nome']);
        $contato->setTelefone($_POST['telefone']);
        $contato->setEmail($_POST['email']);
        $contato->setMensagem($_POST['mensagem']);

        $ContatoDAO = new ContatoDAO();
        $ContatoDAO->salvar($contato);

        $this->render("sucesso/sucesso");
    }

    public function listar()
    {
        $contatoDAO = new ContatoDAO();

        $listagem = $contatoDAO->listar();
        
        return $listagem;
    
    }

    public function visualizar($params)
    {
        $id = $params;

        $contatoDAO = new ContatoDAO();
        
        $this->setViewVar('contatoVisualizar', $contatoDAO->listar($id));

        $this->render('contatos/verContatoAdmin');
    }

    public function exclusao($params)
    {
        $id = $params;

        $contatoDAO = new ContatoDAO();

        $this->setViewVar('contatoExclusao', $contatoDAO->listar($id));

        $this->render('contatos/excluirContato');
    }

    public function excluir()
    {
        $contato = new Contato();
        $contato->setId($_POST['id']);

        $contatoDAO= new ContatoDAO();

        $contatoDAO->excluir($contato);

        $this->render("sucesso/sucesso");
    }

}