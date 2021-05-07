<?php

namespace AppPT;

use AppPT\Controllers\IndexController;
use AppPT\Controllers\AdminController;
use AppPT\Controllers\ContatoController;
use AppPT\Controllers\CurriculoController;
use AppPT\Controllers\LoginController;
use AppPT\Controllers\ProjetosController;
use AppPT\Controllers\UsuariosController;
use Exception;

class AppPT 
{

    private $controller;
    private $controllerName;
    private $controllerFile;
    private $metodo;
    private $params;

    public function __construct()
    {
        // Constantes para todo o sistema
        define("APP_HOST", "http://" . $_SERVER['HTTP_HOST']."/public_html");
        define("PATH",realpath('./'));
        define("DB_HOST","localhost");
        define("DB_USER","root");
        define("DB_PASSWORD","");
        define("DB_NAME","meusitepro");
        define("DB_DRIVER","mysql");

        $this->url();
    }

    private function url()
    { // Trata as URLs para serem usadas no método run, para chamar os controllers!

        if( isset($_GET['url'] ) )
        {

            $path = $_GET['url']; 

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
            $index = new IndexController();
            $index->exibe();
            
        }
        
        if($this->controller)
        {

            $this->controllerName = ucwords($this->controller) . "Controller";
            $this->controllerName = preg_replace('/[^A-Za-z]/i','',$this->controllerName);

        }else{
            $this->controllerName = 'IndexController';
        }
        
        $this->controllerFile = $this->controllerName . ".php";

        if(!file_exists(PATH."/AppPT/Controllers/".$this->controllerFile))
        {
            throw new Exception("Página não encontrada!",404);
        }
    
        $classe =  'AppPT\\Controllers\\'.$this->controllerName;
        $objeto = new $classe(); 

        if(!class_exists($classe))
        {
            throw new Exception('Erro na aplicação.',500);
        }

        if(!$this->metodo)
        {
            $objeto->exibe();
        }
        
        if(method_exists($objeto,$this->metodo))
        {  
            $objeto->{$this->metodo}($this->params);
        }else if($this->metodo && !method_exists($objeto,"$this->metodo"))
        {
            throw new Exception("Página não encontrada!",500);
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





















































        