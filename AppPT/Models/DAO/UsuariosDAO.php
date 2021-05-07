<?php

namespace AppPT\Models\DAO;

use AppPT\Models\DAO\BaseDAO;
use AppPT\Models\Entidades\Usuarios;

class UsuariosDAO extends BaseDAO
{

    public function salvar(Usuarios $usuarios)
    {   
        try
        {
            $id = $usuarios->getId();
            $usuario = $usuarios->getUsuario();
            $senha = $usuarios->getSenha();
            $privilegio = $usuarios->getPrivilegio();
            $email = $usuarios->getEmail();

            $this->insert(
                'usuarios',
                ':id, :usuario, :senha, :privilegio, :email',
                [
                    ':id'=>$id,
                    ':usuario'=>$usuario,
                    ':senha'=>$senha,
                    ':privilegio'=>$privilegio,
                    ':email'=>$email
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
            $resultado = $this->select("SELECT * FROM usuarios WHERE id=$id");
            return $resultado->fetchObject(Usuarios::class);

        }else
        {
            $resultado = $this->select("SELECT * FROM usuarios");
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Usuarios::class);
        }
        return false;

    }

    public function resetaIncrementId()
    {
        $this->alterTableResetElement();
    }

    public function atualizar(Usuarios $usuarios)
    {
        try
        {   
            $id = $usuarios->getId();
            $usuario = $usuarios->getUsuario();
            $senha = $usuarios->getSenha();
            $privilegio = $usuarios->getPrivilegio();
            $email = $usuarios->getEmail();

            $this->update(
                'usuarios',
                'usuario = :usuario, senha = :senha, privilegio = :privilegio, email = :email',
                [
                    ':id'=>$id,
                    ':usuario'=>$usuario,
                    ':senha'=>$senha,
                    ':privilegio'=>$privilegio,
                    ':email'=>$email
                ],
                "id = :id"
            );

        }catch(Exception $e)
        {
            throw new Exception('Erro na gravação de dados!',500);
        }
        
    }

    public function excluir(Usuarios $usuarios)
    {   
        try
        {
            $id = $usuarios->getId();

            $this->delete(
                'usuarios',
                "id = $id"
            );

        }catch(Exception $e)
        {
            throw new Exception('Erro ao excluir dados!',500);
        }
        
    }

}







?>