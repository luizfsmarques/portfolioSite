<?php

namespace App;

use App\Controllers\HomeController;
use Exception;

use App\Controllers\ProdutoController;

class App
{

    private $controller;
    private $controllerName;
    private $controllerFile;
    private $metodo;
    private $params;

    public function __construct()
    {
         //Constantes do sistema

         define('APP_HOST','http://'. $_SERVER['HTTP_HOST']."/public_html/projetos-meusitepro/crud-php");
         define('PATH', realpath('./'));
         define('DB_HOST', "localhost");
         define('DB_USER',"root");
         define('DB_PASSWORD',"");
         define('DB_NAME',"crudphp");
         define('DB_DRIVER',"mysql");


        $this->url();
    }

    
    private function url()
    { // Trata as URLs para serem usadas no método run, para chamar oscontrollers!

        if( isset($_GET["url"] ) )
        {
            $path = $_GET["url"]; 

            $path = rtrim($path,'/');
            $path = filter_var($path, FILTER_SANITIZE_URL);
            $path = explode('/',$path);

            $this->controller = $this->verificaArray($path,0);

            $this->metodo = $this->verificaArray($path,1);
    
            if($this->params = $this->verificaArray($path,2) )
            {
                unset($path[0]);
                unset($path[1]);
                $params = array_values($path);
            }
        }
    }
    
    private function verificaArray($array,$key)
    {//Verifica se os "campos" da URL estão com conteúdo

        if(isset($array[$key]) && !empty($array[$key]))
        {
            return $array[$key];
        }
        return null;      
    }

    public function run()
    {
    //Responsável por direcionar as requisições da URL para seus respectivos arquivos
        
      if(!$this->controller)
        {
            $index = new HomeController($this);
            $index->index();
        }
        
        if($this->controller)
        {

            $this->controllerName = ucwords($this->controller) . "Controller";
            $this->controllerName = preg_replace('/[^A-Za-z]/i','',$this->controllerName);

        }else{
            $this->controllerName = 'HomeController';
        }
        
        $this->controllerFile = $this->controllerName . ".php";

        if(!file_exists( PATH . "/App/Controllers/".$this->controllerFile))
        {   
            throw new Exception("Página não encontrada.",404);
        }

        //Instaciação da classe através dos dados vindos da url
        $classe = "App\\Controllers\\" . $this->controllerName;
        $objeto = new $classe($this);

        if(!class_exists($classe))
        {
            throw new Exception("Erro na aplicação",500);
        }

        if(!$this->metodo)
        {
            $objeto->index(); 
        }   
        
        if( method_exists($objeto,$this->metodo))
        {
            $objeto->{$this->metodo}($this->params);  
            
        }else if(!$this->metodo && method_exists($objeto, 'index') )
        {
            $objeto->index($this->params);
        }else if(!$this->metodo && !method_exists($objeto, 'index') )
        {   
            throw new Exception("Nosso suporte já está verificando, desculpe!",500);
        }else{
            throw new Exception("Página não encontrada!",404);
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

    public function getMetodo()
    {
        return $this->metodo;
    }

    public function getParams()
    {
        return $this->params;
    }

}



?>





















































        