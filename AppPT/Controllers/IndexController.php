<?php 

namespace AppPT\Controllers;

use AppPT\Controllers\Controller;

class IndexController extends Controller
{

    public function exibe()
    {

        $this->render("index");    
    }
    
}

?>