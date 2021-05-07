<?php

namespace AppEN\Models\DAO;

use AppEN\Models\Entities\Contact;

class ContactDAO extends BaseDAO
{

    public function save(Contact $contact)
    {

        try
        {
            $subjectMatter = $contact->getAssunto();
            $name = $contact->getNome();
            $telephone = $contact->getTelefone();
            $email = $contact->getEmail();
            $message = $contact->getMensagem();

            $this->insert(
                'contatos',
                ':assunto,:nome,:telefone,:email,:mensagem',
                [
                    ':assunto'=>$subjectMatter,
                    ':nome'=>$name,
                    ':telefone'=>$telephone,
                    ':email'=>$email,
                    ':mensagem'=>$message
                ]
            );
            
        }catch(Exception $e)
        {
            throw new Exception('Error on recording the data.',500);
        }

    }

    public function list($id=null)
    {
        if($id)
        {   
            $resultado = $this->select("SELECT * FROM contatos WHERE id = $id");
            return $resultado->fetchObject(Contact::class);

        }else
        {
            $resultado = $this->select("SELECT * FROM contatos");
            return $resultado->fetchAll(\PDO::FETCH_CLASS,Contact::class);
        }
        return false;
    }

    public function resetIncrementId()
    {
        $this->alterTableResetElement();
    }

    public function deleting(Contact $contact)
    {   
        try
        {
            $id = $contact->getId();

            $this->delete('contatos', "id = $id");

        }catch(\Exception $e)
        {
            throw new Exception('Error on delete data.',500);
        }
    }
        
}


?>