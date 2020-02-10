<?php 
namespace core\system;

use core\system\Controller;

class Router 
{
    private $method;
    private $uri;
    private $params= [];

    public function __construct(array $routes)
    {
        $this->uri= explode('/', substr($_SERVER['REQUEST_URI'], 1));
        $this->method= strtolower($_SERVER['REQUEST_METHOD']);
        
        $this->findRoute($routes);
        
    }
    
    private function findRoute(array $routes)
    {
        foreach ( $routes[$this->method] as $route=>$action ) {
            $route= explode('/', $route);

            if ( $route[0] === $this->uri[0] and count($route) === count($this->uri) ) {
                
                $this->params= [];
                for ( $i=0; $i<count($route); $i++ ) {
                    $item= $route[$i];
                    $param= $this->uri[$i];

                    if ( substr($item, 0, 1) === ':' ) {
                        $this->params[]= $param;
                    }
                }
                break;
            }
        }

        $action= explode('/', $action);
        $class= $action[0];
        $method= (isset($action[1]))? $action[1]: 'index';

        Controller::execute($class, $method, $this->params);

    }


}