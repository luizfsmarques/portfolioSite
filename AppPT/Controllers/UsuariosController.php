<?php

namespace AppPT\Controllers;

use AppPT\Controllers\Controller;
use AppPT\Models\DAO\UsuariosDAO;
use AppPT\Models\Entidades\Usuarios;
use AppPT\Lib\Criptografia;

class UsuariosController extends Controller
{
    public function principalUsuarios()
    {   
        $this->listar();

        $this->render('usuarios/principalUsuarios');
    }

    public function salvar()
    {
        $Usuarios = new Usuarios();
        $Usuarios->setId(null);
        $Usuarios->setUsuario($_POST['usuario']);
        $Usuarios->setSenha($_POST['senha']);
        $Usuarios->setPrivilegio($_POST['privilegio']);
        $Usuarios->setEmail($_POST['email']);

        $Criptografia = new Criptografia();
        $Criptografia->setSenhaSegura($Usuarios->getSenha());

        $senhaSegura = $Criptografia->getSenhaSegura();
        $Usuarios->setSenha($senhaSegura);

        $usuariosDAO = new UsuariosDAO();
        $usuariosDAO->salvar($Usuarios);

        $this->render('sucesso/sucessoInterno');
       

    }

    public function listar()
    {
        $usuariosDAO = new UsuariosDAO();

        $this->setViewVar('usuarios', $usuariosDAO->listar());  

    }

    public function listarParaAutenticacao()
    {
        $usuariosDAO = new UsuariosDAO();
        return $usuariosDAO->listar();
    }

    public function edicao($params)
    {   
        $id = $params;

        $usuariosDAO = new UsuariosDAO();
        $this->setViewVar('usuariosEdicao', $usuariosDAO->listar($id));

        $this->render('usuarios/edicaoUsuarios');
    }

    public function atualizar()
    {
        $usuarios = new Usuarios();
        $usuarios->setId($_POST['id']);
        $usuarios->setUsuario($_POST['usuario']);
        $usuarios->setSenha($_POST['senha']);
        $usuarios->setPrivilegio($_POST['privilegio']);
        $usuarios->setEmail($_POST['email']);

        $Criptografia = new Criptografia();
        $Criptografia->setSenhaSegura($usuarios->getSenha());

        $senhaSegura = $Criptografia->getSenhaSegura();
        $usuarios->setSenha($senhaSegura);

        $usuariosDAO = new UsuariosDAO();
        $usuariosDAO->atualizar($usuarios);

        $this->render('sucesso/sucessoInterno');

    }

    public function exclusao($params)
    {
        $id = $params;

        $usuariosDAO = new UsuariosDAO();

        $this->setViewVar('usuariosExclusao', $usuariosDAO->listar($id));

        $this->render('usuarios/exclusaoUsuarios');
    }

    public function excluir()
    {
        $usuarios = new Usuarios();
        $usuarios->setId($_POST['id']);

        $usuariosDAO = new UsuariosDAO();
        $usuariosDAO->excluir($usuarios);

        $this->render('sucesso/sucessoInterno');

    }




}