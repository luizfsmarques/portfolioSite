<?php

namespace AppEN\Models\DAO;

use AppEN\Models\Entities\Users;
use AppEN\Lib\Cryptography;

class UsersDAO extends BaseDAO
{

    public function save(Users $users)
    {   
        try
        {   
            $id = $users->getId();
            $user = $users->getUsuario();
            $privilege = $users->getPrivilegio();
            $password = $users->getSenha();
            $email = $users->getEmail();

            $this->insert(
                'usuarios',
                ':id, :usuario, :senha, :privilegio, :email',
                [
                    ':id'=>$id,
                    ':usuario'=>$user,
                    ':senha'=>$password,
                    ':privilegio'=>$privilege,
                    ':email'=>$email
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
            $resultado = $this->select("SELECT * FROM usuarios WHERE id=$id");
            return $resultado->fetchObject(Users::class);

        }else
        {
            $resultado = $this->select("SELECT * FROM usuarios");
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Users::class);
        }
        return false;

    }

    public function resetaIncrementId()
    {
        $this->alterTableResetElement();
    }

    public function updating(Users $users)
    {
        try
        {   
            $id = $users->getId();
            $user = $users->getUsuario();
            $password = $users->getSenha();
            $privilege = $users->getPrivilegio();
            $email = $users->getEmail();

            $this->update(
                'usuarios',
                'usuario = :usuario, senha = :senha, privilegio = :privilegio, email = :email',
                [
                    ':id'=>$id,
                    ':usuario'=>$user,
                    ':senha'=>$password,
                    ':privilegio'=>$privilege,
                    ':email'=>$email
                ],
                "id = :id"
            );

        }catch(Exception $e)
        {
            throw new Exception('Error on recording the datas.',500);
        }
        
    }

    public function deleting(Users $users)
    {   
        try
        {
            $id = $users->getId();

            $this->delete(
                'usuarios',
                "id = $id"
            );

        }catch(Exception $e)
        {
            throw new Exception('Error on delete data.',500);
        }
        
    }

}







?>