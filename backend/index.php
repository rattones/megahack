<?php
require_once '__autoload.php';
require_once './core/library/TwitterApi.php';

use core\db\PDOConnection;
use core\system\ApiAuth;
use core\system\Controller;
use core\system\Router;

class App 
{
    public $db; 
    
    public function __construct()
    {
        require_once('app/config.php');
        $this->routes= $routes;
        $this->db= new PDOConnection();
    }

    public function run() 
    {
        if ( ApiAuth::auth() ) {
            $router= new Router($this->routes);
        } else {
            Controller::response(401);
        }
        // \debug($this->db);
    }
}

$app= new App();
$app->run();