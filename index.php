<?php 

use AppPT\AppPT;
use AppPT\Lib\Erro;

error_reporting(E_ALL & ~E_NOTICE); // Os erros que não comprometem o sistema não são reportados

session_start();

require_once("vendor/autoload.php");

try
{
    $app = new AppPT();
    $app->run();

}catch(\Exception $e)
{
    $erro = new Erro($e);
    $erro->render();
}

?>