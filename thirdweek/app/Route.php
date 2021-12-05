<?php


namespace App;

//Раскладывает $_SERVER['REQUEST_URI'] и выдает название Класса и Метода
class Route
{
    private $routes;
    private $controller;
    private $action;

    public function add(string $route, $controllerName, $actionName = 'index')
    {
        $this->routes[$route] = [$controllerName, $actionName];
    }
    public function auto($uri)
    {
        $parts = explode('/', $uri);
        if (empty($parts[1])) {
            return false;
        }
        $controllerName = $parts[1];
        $actionName = 'index';
        if (isset($parts[2])) {
            $actionName = $parts[2];
        }
        $controllerClassName = 'App\\Controller\\' . ucfirst(strtolower($controllerName));
        if (!class_exists($controllerClassName)) {
            return false;
        }

        $this->controller = new $controllerClassName();
        if (!method_exists($this->controller, $actionName)) {
            return false;
        }

        $this->action = $actionName;
        return true;
    }
     public function dispatch(string $uri)
    {
        if($uri == '/'){
            $this->action ='Index';
            $this->controller = new ('\\App\\Controller\\Login');
            return;
        }
/*        $parts = explode('/', $uri);
        $parts1 = ucfirst(strtolower($parts[1])) . '.php';
        if(!array_search($parts1, scandir(__DIR__.'\Controller\\'))){
            echo 'Такого контроллера ' . '\\App\\Controller\\' .
                ucfirst(strtolower($parts[1])) . ' не сущестыует';die();
        }
        $classMethods = get_class_methods('\\App\\Controller\\Login');
        if(array_search($parts[2], $classMethods) === false){
            echo 'Метода ' . $parts[2] . ' в контроллере ' .
                '\\App\\Controller\\' . ucfirst(strtolower($parts[1])) .
                ' не сущестыует';die();
        }*/

        $parsed = parse_url($uri);
        $uri = $parsed['path'];
        if (isset($this->routes[$uri])) {
            $this->controller = new $this->routes[$uri][0];
            $this->action = $this->routes[$uri][1];

            return;
        }
          else {
                $parts = explode('/', $uri);
                $this->controller = '\\App\\Controller\\' . ucfirst(strtolower($parts[1]));
                $this->action = strtolower($parts[2] ?? 'Index');
                $this->controller = new ($this->controller);

              // if(!class_exists( $this->controller )){
              //      echo 'Такого контроллера ' . $this->controller . ' не сущестыует'; die();
              // }
            }
        if (!$this->auto($uri)) {
            throw new Error404Exception();
        }
    }


    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }
}