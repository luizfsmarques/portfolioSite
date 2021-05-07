<?php

namespace AppPT\Models\Entidades;

class Projetos
{
    private $id;
    private $tipo;
    private $nome;
    private $tecnologia;
    private $imagem;
    private $descricao;
    private $link;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setTecnologia($tecnologia)
    {
        $this->tecnologia = $tecnologia;
    }

    public function getTecnologia()
    {
        return $this->tecnologia;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getLink()
    {
        return $this->link;
    }

}    

?>