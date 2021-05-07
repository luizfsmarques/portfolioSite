<?php

namespace AppPT\Models\DAO;

use AppPT\Models\DAO\BaseDAO;
use AppPT\Models\Entidades\Contato;

class ContatoDAO extends BaseDAO
{

    public function salvar(Contato $contato)
    {

        try
        {
            $assunto = $contato->getAssunto();
            $nome = $contato->getNome();
            $telefone = $contato->getTelefone();
            $email = $contato->getEmail();
            $mensagem = $contato->getMensagem();

            $this->insert(
                'contatos',
                ':assunto,:nome,:telefone,:email,:mensagem',
                [
                    ':assunto'=>$assunto,
                    ':nome'=>$nome,
                    ':telefone'=>$telefone,
                    ':email'=>$email,
                    ':mensagem'=>$mensagem
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
            $resultado = $this->select("SELECT * FROM contatos WHERE id = $id");
            return $resultado->fetchObject(Contato::class);

        }else
        {
            $resultado = $this->select("SELECT * FROM contatos");
            return $resultado->fetchAll(\PDO::FETCH_CLASS,Contato::class);
        }
        return false;
    }

    public function resetaIncrementId()
    {
        $this->alterTableResetElement();
    }

    public function excluir(Contato $contato)
    {   
        try
        {
            $id = $contato->getId();

            $this->delete('contatos', "id = $id");

        }catch(\Exception $e)
        {
            throw new Exception('Erro ao excluir dados!',500);
        }
    }
        
}


?>