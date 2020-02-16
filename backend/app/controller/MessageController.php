<?php
namespace app\controller;

use app\model\MessageModel;
use core\system\Controller;

class MessageController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getMessage(string $uuid)
    {
        $model= new MessageModel();
        $msg= $model->get($uuid);

        self::response(200, (array)$msg);
    }

    public function getUserMessages(string $uuid)
    {
        $model= new MessageModel();
        $msg= $model->getByUser($uuid);

        self::response(200, $msg);
    }

    public function sendNewMessage()
    {
        $msg= self::_POST();
        $model= new MessageModel();
        $msg= $model->add($msg);
        
        self::response(200, (array)$msg);
    }

    public function getChannelMessages()
    {
        $term= self::_POST();
        $model= new MessageModel();
        $msgs= $model->searchChannel($term['term']);

        self::response(200, (array)$msgs);
    }

}