<?php

namespace AppEN\Models\DAO;

use AppEN\Models\Entities\Projects;

class ProjectsDAO extends BaseDAO
{

    public function save(Projects $projects)
    {
        try
        {
            $type = $projects->getTipo();
            $name = $projects->getNome();
            $technology = $projects->getTecnologia();
            $image = $projects->getImagem();
            $description = $projects->getDescricao();
            $link = $projects->getLink();

            return $this->insert(
                'projetos',
                ':tipo,:nome,:tecnologia,:imagem,:descricao,:link',
                [
                    ':tipo'=>$type,
                    ':nome'=>$name,
                    ':tecnologia'=>$technology,
                    ':imagem'=>$image,
                    ':descricao'=>$description,
                    ':link'=>$link
                ]
            );
            
        }catch(Exception $e)
        {
            throw new Exception('Error on recording the datas.',500);
        }
        
    }

    public function list($id=null)
    {
        if($id)
        {
            $resultado = $this->select("SELECT * FROM projetos WHERE id = $id");
            return $resultado->fetchObject(Projects::class);
        }else
        {
            $resultado = $this->select('SELECT * FROM projetos');
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Projects::Class);
        }
        return false;
    }

    public function resetIncrementId()
    {
        $this->alterTableResetIncrement();
    }

    public function updating(Projects $projects)
    {
        try
        {
            $id = $projects->getId();
            $type = $projects->getTipo();
            $name = $projects->getNome();
            $technology = $projects->getTecnologia();
            $image = $projects->getImagem();
            $description = $projects->getDescricao();
            $link = $projects->getLink();

            $this->update(
                'projetos',
                'tipo = :tipo, nome = :nome, tecnologia = :tecnologia, imagem = :imagem, descricao = :descricao, link = :link',
                [
                    ":id"=>$id,
                    ":tipo"=>$type,
                    ":nome"=>$name,
                    ":tecnologia"=>$technology,
                    ":imagem"=>$image,
                    ":descricao"=>$description,
                    ":link"=>$link
                ],
                "id = :id"
            );

        }catch(Exception $e)
        {
            throw new Exception('Error on recording the datas.',500);
        }
        
    }

    public function deleting(Projects $projects) 
    {
        try
        {
            $id = $projects->getId();

            $this->delete(
                'projetos',
                "id = $id"
            );

        }catch(Exception $e)
        {
            throw new Exception('Error on delete data.',500);
        }
    }





}

