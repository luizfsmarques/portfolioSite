<?php

namespace AppEN\Controllers;

use AppEN\Models\Entities\Projects;

use AppEN\Models\DAO\ProjectsDAO;


class ProjectsController extends Controller
{
    private $diretorioImagem = "C:/xampp/htdocs/public_html/public/img/projetos/";

    public function save() 
    {   
        $Projects = new Projects();
        $Projects->setId(null);
        $Projects->setTipo($_POST['tipo']);
        $Projects->setNome($_POST['nome']);
        $Projects->setTecnologia($_POST['tecnologia']);
        $Projects->setImagem($_FILES['imagem']['name']);
        $Projects->setDescricao($_POST['descricao']);
        $projetos->setLink($_POST['link']); 
        
        
        move_uploaded_file($_FILES['imagem']['tmp_name'],$this->diretorioImagem.$_FILES['imagem']['name']);

        $ProjectsDAO = new ProjectsDAO();
        $ProjectsDAO->save($Projects);

        $this->render('success/internalSuccess');
   
    }

    public function listing_personal_projects()
    {   
       $projectsDAO = new ProjectsDAO();


        $this->setViewVar('projetos',$projectsDAO->list());

        $this->render('personalProjects');
    }

    public function listing_professional_projects()
    {
        $projectsDAO = new ProjectsDAO();

        $this->setViewVar('projects', $projectsDAO->list());

        $this->render('professionalProjects');
    }

    public function listing_admin_projects()
    {
        $projectsDAO = new ProjectsDAO();

        $listing = $projectsDAO->list();

        return $listing;
    }


    public function edition($params)
    {
        $id= $params;

        $projectsDAO = new ProjectsDAO();

        $this->setViewVar('projectsUpdate', $projectsDAO->list($id));

        $this->render('projects/updateProjects');
    }

    public function update()
    {
        $projects = new Projects();
        
        $projects->setId($_POST['id']);
        $projects->setTipo($_POST['tipo']);
        $projects->setNome($_POST['nome']);
        $projects->setTecnologia($_POST['tecnologia']);
        $projects->setImagem($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'],$this->diretorioImagem.$_FILES['imagem']['name']);
        $projects->setDescricao($_POST['descricao']);
        $projetos->setLink($_POST['link']);  

        $projectsDAO = new ProjectsDAO();
        $projectsDAO->updating($projects);

        $this->render('success/internalSuccess');
    }

    public function exclusion($params)
    {
        $id = $params;

        $projectsDAO = new ProjectsDAO();
        $this->setViewVar('projectsDelete', $projectsDAO->list($id));

        $this->render('projects/deleteProjects');
    }
    
    public function delete()
    {
        $projects = new Projects();
        $projects->setId($_POST['id']);

        $projectsDAO = new ProjectsDAO();
        $projectsDAO->deleting($projects);

        $this->render('success/internalSuccess');
    }

}

