<?php

namespace App;

class Application
{
    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    public function run()
    {
        $view = new View();
        $view->setTemplatePath(__DIR__ . '/View');
            $this->route->dispatch($_SERVER['REQUEST_URI']);
            $controller = $this->route->getController();
            $action = $this->route->getAction();
            $controller->setView($view);

            $session = new Session();
            $session->init();
            $controller->setSession($session);
            $controller->preDispatch();
            $result = $controller->$action();
            echo $result;
    }
}