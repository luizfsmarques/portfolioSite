<?php

namespace AppEN\Lib;

class Errors
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

        if(file_exists( PATH . "/AppEN/Views/pages/errors/" . $this->code . ".php") )
        {
            require_once PATH . "/AppEN/Views/pages/errors/" . $this->code . ".php"; 
        }else
        {
            require_once  PATH . "/AppEN/Views/pages/errors/500.php"; 
        }
    }

}

?>