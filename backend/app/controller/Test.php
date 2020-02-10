<?php
namespace app\controller;

use core\system\Controller;
use stdClass;

class Test extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Method()
    {
        $obj= new stdClass();
        $obj->message= 'Ok, controler Teste e método Method executados';

        self::response(200, (object)$_SERVER);
    }
}