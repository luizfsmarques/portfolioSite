<?php

namespace AppPT\Models\Autenticacao;

use AppPT\Controllers\UsuariosController;
use AppPT\Lib\Criptografia;

class AutenticacaoLogin
{
    public function verificaLogin($user,$password)
    {
        $UsuariosController = new UsuariosController();
        $dados = $UsuariosController->listarParaAutenticacao();

        $acessoNegado = false; 

        foreach($dados as $resultado)
        {
            $Criptografia = new Criptografia();
            $verificaParaAutenticacao = $Criptografia->verificaParaAutenticacao($password, $resultado->getSenha());

            if( ($user == $resultado->getUsuario()) && ($verificaParaAutenticacao == true) )
            {
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
                $_SESSION['privilegio'] =  $resultado->getPrivilegio();

                return true;
                exit; //Teste

            }else
            {
                $acessoNegado = true;
            }
        }

        if($acessoNegado == true)
        {
            unset($_SESSION['user']);
            unset($_SESSION['password']);
            unset($_SESSION['privilegio']);

            return false;
        }
    }
}

?>