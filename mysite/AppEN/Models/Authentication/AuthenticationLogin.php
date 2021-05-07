<?php

namespace AppEN\Models\Authentication;

use AppEN\Controllers\UsersController;
use AppEN\Lib\Cryptography;

class AuthenticationLogin
{
    public function checkLogin($user,$password)
    {
        $UsersController = new UsersController();
        $datas = $UsersController->listToAuthentication();

        $accessDenied = false; 

        foreach($datas as $result)
        {
            $Cryptography = new Cryptography();
            $checkToAuthentication = $Cryptography->checkToAuthentication($password, $result->getSenha());

            if( ($user == $result->getUsuario()) && ($checkToAuthentication == true) )
            {
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
                $_SESSION['privilegio'] =  $result->getPrivilegio();

                return true;
                exit; 

            }else
            {
                $accessDenied = true;
            }
        }

        if($accessDenied == true)
        {
            unset($_SESSION['user']);
            unset($_SESSION['password']);
            unset($_SESSION['privilegio']);

            return false;
        }
    }
}

?>