<?php 

namespace AppEN\Controllers;

use AppEN\Controllers\Controller;

class IndexController extends Controller
{

    public function show()
    {

        $this->render("index");    
    }
    
}

?>