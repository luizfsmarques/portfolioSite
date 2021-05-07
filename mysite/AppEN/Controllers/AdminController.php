<?php

namespace AppEN\Controllers;

use AppEN\Controllers\LoginController;
use AppEN\Controllers\ContactController;
use AppEN\Controllers\UsersController;
use AppEN\Models\DAO\ProjectsDAO;


class AdminController extends Controller
{   
    
    public function __construct()
    {
        $projectsController = new ProjectsController();
        $this->setViewVar('projectsAdmin', $projectsController->listing_admin_projects());

        $contactController = new ContactController();
        $this->setViewVar('contacts',$contactController->list());
 
    } 

    public function show()
    {   
        $this->render('admin');
    }

}