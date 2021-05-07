<?php

namespace AppEN\Controllers;

use AppEN\Models\DAO\ContactDAO;
use AppEN\Models\Entities\Contact;


class ContactController extends Controller
{

    public function show()
    {
        $this->render('contact');
    }

    public function save()
    {
        $contact = new Contact();
        $contact->setId(null);
        $contact->setAssunto($_POST['assunto']);
        $contact->setNome($_POST['nome']);
        $contact->setTelefone($_POST['telefone']);
        $contact->setEmail($_POST['email']);
        $contact->setMensagem($_POST['mensagem']);

        $ContactDAO = new ContactDAO();
        $ContactDAO->save($contact);

        $this->render("success/successContact");
    }

    public function list()
    {
        $contactDAO = new ContactDAO();

        $listing = $contactDAO->list();
        
        return $listing;
    
    }

    public function toView($params)
    {
        $id = $params;

        $contactDAO = new ContactDAO();
        
        $this->setViewVar('contactToView', $contactDAO->list($id));

        $this->render('contacts/toViewContactAdmin');
    }

    public function exclusion($params)
    {
        $id = $params;

        $contactDAO = new ContactDAO();

        $this->setViewVar('contactDelete', $contactDAO->list($id));

        $this->render('contacts/deleteContact');
    }

    public function delete()
    {
        $contact = new Contact();
        $contact->setId($_POST['id']);

        $contactDAO= new ContactDAO();

        $contactDAO->deleting($contact);

        $this->render("success/internalSuccess");
    }

}