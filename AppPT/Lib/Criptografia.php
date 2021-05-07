<?php

namespace AppPT\Lib;

class Criptografia
{

    private $senhaSegura;
    private $options;

    public function setSenhaSegura($senha)
    {
        $this->options = ["cost"=>10];

        $this->senhaSegura = password_hash($senha, PASSWORD_DEFAULT,$this->options);

    }

    public function getSenhaSegura()
    {
        return $this->senhaSegura;
    }

    public function verificaParaAutenticacao($password,$senhaSegura)
    {
        return password_verify($password,$senhaSegura);
    }


}