<?php 

use AppEN\AppEN;
use AppEN\Lib\Errors;

error_reporting(E_ALL & ~E_NOTICE); 

session_start();

require_once("vendor/autoload.php");

try
{
    //Starts the application
    $app = new AppEN();
    $app->run();

}catch(\Exception $e)
{
    $errors = new Errors($e);
    $errors->render();
}


?>