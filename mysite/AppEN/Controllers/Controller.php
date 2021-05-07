<?php

namespace AppEN\Controllers;

abstract class Controller    
{
    private $viewVar;

    public function render($view)
    {   
        $viewVar = $this->getViewVar();
        
        require_once "C:/xampp/htdocs/public_html/mysite/AppEN/Views/pages/" . $view . ".php"; 
    }

    public function redirect($view)
    {
        header("Location: " . APP_HOST . $view);
        exit;
    }

    public function setViewVar($varName,$varValue)
    {
        if( $varName!="" && $varValue!="")
        {
            $this->viewVar[$varName] = $varValue;
        }
    }

    public function getViewVar()
    {
        return $this->viewVar;
    }

}