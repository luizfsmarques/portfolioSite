<?php

namespace AppEN\Models\Entities;

class Users
{
    private $id;
    private $usuario;
    private $senha;
    private $privilegio;
    private $email;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setPrivilegio($privilegio)
    {
        $this->privilegio = $privilegio;
    }

    public function getPrivilegio()
    {
        return $this->privilegio;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
}