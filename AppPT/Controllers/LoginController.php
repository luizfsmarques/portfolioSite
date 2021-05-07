<?php

namespace AppPT\Controllers;

use AppPT\Controllers\Controller;
use AppPT\Controllers\AdminController;
use AppPT\Models\Autenticacao\AutenticacaoLogin;


class LoginController extends Controller
{
    public function exibe()
    {
        $this->render('login');
    }

   public function entrar()
   {
       $user = $_POST['usuario'];
       $password = $_POST['senha'];

       $Autenticacao = new AutenticacaoLogin();
       $permissao = $Autenticacao->verificaLogin($user,$password);

       if($permissao == true)
       {    
            header("Location:" . APP_HOST . '/admin');
       }else
       {
            echo "<p> Acesso negado! Você não tem permissão para acessar essa página! </p>";
            echo "<p> Volte para a página inicial. </p>";
       }
   }

   public function logout()
   {
       unset($_SESSION['user']);
       unset($_SESSION['password']);
       unset($_SESSION['privilegio']);

       header("Location:" . APP_HOST . '/login');
   }

}



