<?php

namespace AppEN\Models\Entities;

use DateTime;

class Contact 
{
    
    private $id;
    private $assunto;
    private $nome;
    private $telefone;
    private $email;
    private $mensagem;
    private $dataContato;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;
    }

    public function getAssunto()
    {
       return $this->assunto;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
       return $this->nome;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getTelefone()
    {
       return $this->telefone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
       return $this->email;
    }

    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    public function getMensagem()
    {
       return $this->mensagem;
    }

    public function setDataContato($dataContato)
    {
        $this->dataContato = $dataContato;
    }

    public function getDataContato()
    {
        return new DateTime($this->dataContato);
    }
    
}





?>