<?php

namespace AppEN;

use AppEN\Controllers\IndexController;
use AppEN\Controllers\ResumeController;
use AppEN\Controllers\ContactController;
use AppEN\Controllers\ProjectsController;
use AppEN\Controllers\LoginController;
use AppEN\Controllers\AdminController;
use AppEN\Controllers\UsersController; 
use Exception;

class AppEN 
{

    private $controller;
    private $controllerName;
    private $controllerFile;
    private $method;
    private $params;

    public function __construct()
    {
        // System's constants
        define("APP_HOST", "http://" . $_SERVER['HTTP_HOST']."/public_html/mysite");
        define("PATH",realpath('./'));
        define("DB_HOST","localhost");
        define("DB_USER","root");
        define("DB_PASSWORD","");
        define("DB_NAME","meusitepro");
        define("DB_DRIVER","mysql");

        $this->url();
    }

    private function url()
    { // Treat the URLs to be used into run method, to call the controllers.
        
        if( isset($_GET['url'] ) )
        {

            $path = $_GET['url']; 

            $path = rtrim($path,'/');
            $path = filter_var($path, FILTER_SANITIZE_URL);
            $path = explode('/',$path);

            $this->controller = $this->checkArray($path,0);

            $this->method = $this->checkArray($path,1);
    
            if($this->params = $this->checkArray($path,2) )
            {
                unset($path[0]);
                unset($path[1]);
                $params = array_values($path);
            }
        }
    }
    
    private function checkArray($array,$key)
    {//Check if the fields of URL are filled.
            
        if(isset($array[$key]) && !empty($array[$key]))
        {
            return $array[$key];
        }
        return null;      
    }

    public function run()
    {
    //Responsible by direct the requests of URL to the correct files
    
        
        if(!$this->controller)
        {   
            $index = new IndexController();
            $index->show();
            
        }
        
        if($this->controller)
        {

            $this->controllerName = ucwords($this->controller) . "Controller";
            $this->controllerName = preg_replace('/[^A-Za-z]/i','',$this->controllerName);

        }else{
            $this->controllerName = 'IndexController';
        }
        
        $this->controllerFile = $this->controllerName . ".php";

        if(!file_exists(PATH."/AppEN/Controllers/".$this->controllerFile))
        {
            throw new Exception("Page not found!",404);
        }
    
        $class =  'AppEN\\Controllers\\'.$this->controllerName;
        $object = new $class(); 

        if(!class_exists($class))
        {
            throw new Exception('Application error.',500);
        }

        if(!$this->method)
        {
            $object->show();
        }
        
        if(method_exists($object,$this->method))
        {  
            $object->{$this->method}($this->params);
        }else if($this->method && !method_exists($object,"$this->method"))
        {
            throw new Exception("Page not found!",500);
        }
        
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getControllerFile()
    {
        return $this->controllerFile;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParams()
    {
        return $this->params;
    }

}



?>





















































        