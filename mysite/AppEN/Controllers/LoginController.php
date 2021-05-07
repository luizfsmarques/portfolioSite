<?php

namespace AppEN\Controllers;

use AppEN\Controllers\AdminEnController;
use AppEN\Models\Authentication\AuthenticationLogin;


class LoginController extends Controller
{

    public function show()
    {
        $this->render('login');
    }

   public function getIn()
   {
       $user = $_POST['usuario'];
       $password = $_POST['senha'];

       $Authentication = new AuthenticationLogin();
       $permission = $Authentication->checkLogin($user,$password);

       if($permission == true)
       {    
            header("Location:" . APP_HOST . '/admin');
       }else
       {      
            echo "<p> Access denied! You do not have permission to access this page! </p>";
            echo "<p> Turn back to the home page. </p>";
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



