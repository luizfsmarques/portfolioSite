<?php

namespace AppEN\Controllers;

use AppEN\Models\Entities\Users;
use AppEN\Models\DAO\UsersDAO;
use AppEN\Lib\Cryptography;

class UsersController extends Controller
{
    public function mainUsers()
    {   
        $this->list();

        $this->render('users/mainUsers');
    }

    public function save()
    {
        $users = new Users();
        $users->setId(null);
        $users->setUsuario($_POST['usuario']);
        $users->setSenha($_POST['senha']);
        $users->setPrivilegio($_POST['privilegio']);
        $users->setEmail($_POST['email']);

        $Cryptography = new Cryptography();
        $Cryptography->setSafePassword($users->getSenha());

        $safePassword = $Cryptography->getSafePassword();
        $users->setSenha($safePassword);

        $usersDAO = new UsersDAO();
        $usersDAO->save($users);

        $this->render('success/internalSuccess');
       

    }

    public function list()
    {
        $usersDAO = new UsersDAO();

        $this->setViewVar('users', $usersDAO->list());  

    }

    public function listToAuthentication()
    {
        $usersDAO = new UsersDAO();
        return $usersDAO->list();
    }

    public function edition($params)
    {   
        $id = $params;

        $usersDAO = new UsersDAO();
        $this->setViewVar('usersUpdate', $usersDAO->list($id));

        $this->render('users/updateUsers');
    }

    public function update()
    {
        $users = new Users();
        $users->setId($_POST['id']);
        $users->setUsuario($_POST['usuario']);
        $users->setSenha($_POST['senha']);
        $users->setPrivilegio($_POST['privilegio']);
        $users->setEmail($_POST['email']);

        $Cryptography = new Cryptography();
        $Cryptography->setSafePassword($users->getSenha());

        $safePassword = $Cryptography->getSafePassword();
        $users->setSenha($safePassword);

        $usersDAO = new UsersDAO();
        $usersDAO->updating($users);

        $this->render('success/internalSuccess');

    }

    public function exclusion($params)
    {
        $id = $params;

        $usersDAO = new UsersDAO();

        $this->setViewVar('usersDelete', $usersDAO->list($id));

        $this->render('users/deleteUsers');
    }

    public function delete()
    {
        $users = new Users();
        $users->setId($_POST['id']);

        $usersDAO = new UsersDAO();
        $usersDAO->deleting($users);

        $this->render('success/internalSuccess');

    }




}