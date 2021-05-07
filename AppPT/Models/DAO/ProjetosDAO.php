<?php

namespace AppPT\Models\DAO;

use AppPT\Models\DAO\BaseDAO;
use AppPT\Models\Entidades\Projetos;

class ProjetosDAO extends BaseDAO
{

    public function salvar(Projetos $projetos)
    {
        try
        {
            $tipo = $projetos->getTipo();
            $nome = $projetos->getNome();
            $tecnologia = $projetos->getTecnologia();
            $imagem = $projetos->getImagem();
            $descricao = $projetos->getDescricao();
            $link = $projetos->getLink();

            return $this->insert(
                'projetos',
                ':tipo,:nome,:tecnologia,:imagem,:descricao,:link',
                [
                    ':tipo'=>$tipo,
                    ':nome'=>$nome,
                    ':tecnologia'=>$tecnologia,
                    ':imagem'=>$imagem,
                    ':descricao'=>$descricao,
                    ':link'=>$link
                ]
            );
            
        }catch(Exception $e)
        {
            throw new Exception('Erro na gravação de dados!',500);
        }
        
    }

    public function listar($id=null)
    {
        if($id)
        {
            $resultado = $this->select("SELECT * FROM projetos WHERE id = $id");
            return $resultado->fetchObject(Projetos::class);
        }else
        {
            $resultado = $this->select('SELECT * FROM projetos');
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Projetos::Class);
        }
        return false;
    }

    public function resetaIncrementId()
    {
        $this->alterTableResetIncrement();
    }

    public function atualizar(Projetos $projetos)
    {
        try
        {
            $id = $projetos->getId();
            $tipo = $projetos->getTipo();
            $nome = $projetos->getNome();
            $tecnologia = $projetos->getTecnologia();
            $imagem = $projetos->getImagem();
            $descricao = $projetos->getDescricao();
            $link = $projetos->getLink();

            $this->update(
                'projetos',
                'tipo = :tipo, nome = :nome, tecnologia = :tecnologia, imagem = :imagem, descricao = :descricao, link = :link',
                [
                    ":id"=>$id,
                    ":tipo"=>$tipo,
                    ":nome"=>$nome,
                    ":tecnologia"=>$tecnologia,
                    ":imagem"=>$imagem,
                    ":descricao"=>$descricao,
                    ":link"=>$link
                ],
                "id = :id"
            );

        }catch(Exception $e)
        {
            throw new Exception('Erro na gravação de dados!',500);
        }
        
    }

    public function excluir(Projetos $projetos) 
    {
        try
        {
            $id = $projetos->getId();

            $this->delete(
                'projetos',
                "id = $id"
            );

        }catch(Exception $e)
        {
            throw new Exception('Erro nao excluir dados!',500);
        }
    }





}

