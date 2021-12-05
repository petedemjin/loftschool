<?php
require __DIR__ . '/app/autoload.php';
const ADMIN_IDS = [9];
$route = new \App\Route();

  //$route->add('/api/getUserMessages',\App\Controller\Api::class, 'getUserMessages');
//$route->add('/login/register',\App\Controller\Login::class, 'register');
//$route->add('/blog/index',\App\Controller\Blog::class, 'index');
//$route->add('/blog',\App\Controller\Blog::class, 'index');

$app = new \App\Application($route);
$app->run();


//$controllerName = $route->getController();
//$controller = new $controllerName;

//$actionName = $route->getAction();
//$controller->$actionName();