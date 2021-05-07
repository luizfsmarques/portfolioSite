<?php

namespace App\Controllers;

use App\Lib\Sessao;

abstract class Controller
{
    protected $app;
    private $viewVar;

    public function __construct($app)
    {
        $this->setViewParam('nameController',$app->getControllerName());
        $this->setViewParam('nameAction',$app->getMetodo());
    }

    public function setViewParam($varName, $varValue)
    {
        if($varName != "" && $varValue != "")
        {
            $this->viewVar[$varName] = $varValue;
        }
    }

    public function getViewVar()
    {
        return $this->viewVar;
    }

    public function render($view)
    {   

        $viewVar = $this->getViewVar();
        $Sessao = Sessao::class; 

        require_once PATH . "/App/Views/layouts/header.php";
        require_once PATH . "/App/Views/layouts/menu.php";
        require_once PATH . "/App/Views/" . $view . ".php";
        require_once PATH . "/App/Views/layouts/footer.php";
           
    }

    public function redirect($view)
    {
        header('Location:' . APP_HOST . $view);
        exit;
    }
    
}