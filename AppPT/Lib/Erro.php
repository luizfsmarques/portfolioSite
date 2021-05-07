<?php

namespace AppPT\Lib;

class Erro
{

    private $message;
    private $code;

    public function __construct($ObjectException = Exception::class)
    {
        $this->message = $ObjectException->getMessage();
        $this->code = $ObjectException->getCode();    
    }

    public function render()
    {
        $varMessage = $this->message;

        if(file_exists( PATH . "/AppPT/Views/paginas/erros/" . $this->code . ".php") )
        {
            require_once PATH . "/AppPT/Views/paginas/erros/" . $this->code . ".php"; 
        }else
        {
            require_once  PATH . "/AppPT/Views/paginas/erros/500.php"; 
        }
    }


}



?>