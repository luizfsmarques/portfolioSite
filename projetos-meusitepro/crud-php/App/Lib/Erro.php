<?php

namespace App\Lib;

use Exception;

class Erro
{
    private $message;
    private $code;

    public function __construct($objetoException = Exception::class)
    {
        $this->message = $objetoException->getMessage();
        $this->code = $objetoException->getCode();
    }

    public function render()
    {
        $varmessage = $this->message;
        
        if(file_exists(PATH . "/App/Views/error/" . $this->code .".php"))
        {
            require_once PATH ."/App/Views/error/" . $this->code . ".php";
        }else{
            require_once PATH . "/App/Views/error/500.php";
        }
        exit;

    }

}