<?php
session_start();
date_default_timezone_set('Europe/Riga');


use Core\Router;



require_once '../vendor/autoload.php';

error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router=new Router();
$router->add('', ['controller' => 'Tasks', 'action' => 'index']);
$router->add('{controller}/{action}');
//$router->add('{controller}/{id:\d+}/{action}');
$router->add('{controller}/{action}/{id:\d+}');






$router->dispatch($_SERVER['QUERY_STRING']);


//funkcija datumam
