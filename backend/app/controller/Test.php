<?php
namespace app\controller;

use app\library\TwitterApi;
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
        $obj->message= 'Ok, controler Teste e método Method executados com sucesso';

        self::response(200, (array)$obj);
    }

    public function twitter()
    {
        $tw= new TwitterApi();
        $tw->send('Testando DG/Twitter-PHP library - test 2');
    }
}