<?php
namespace app\controller;

use app\model\UserModel;
use core\system\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUser(string $uuid)
    {
        $model= new UserModel();
        $user= $model->get($uuid);

        self::response(200, (array)$user);
    }

    public function addNewUser()
    {
        $user= self::_POST();
        $model= new UserModel();
        $user= $model->add($user);
        
        self::response(200, (array)$user);
    }
}