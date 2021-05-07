<?php

namespace App\Models\Entidades;

use DateTime;

class Produto
{   
    private $id;
    private $nome;
    private $preco;
    private $quantidade;
    private $descricao;
    private $dataCadastro;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDataCadstro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }

    public function getDataCadastro()
    {
        return new DateTime($this->dataCadastro);
    }

}

