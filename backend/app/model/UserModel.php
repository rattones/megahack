<?php
namespace app\model;

use core\system\Model;

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(string $uuid) : \stdClass
    {
        $query= "select uuid, email, name, region, null as password from user where uuid = '{$uuid}'";
        $result= $this->execute($query);

        $return= $result->fetchObject();
        return ($return)? $return: new \stdClass();
    }

    public function add(array $user) : \stdClass
    {
        $user['uuid']= md5(uniqid(rand(), true));
        $user['password']= md5("{$user['uuid']}{$user['password']}");

        $query= "
            insert into user (uuid, email, name, password, region)
            values ('{$user['uuid']}', '{$user['email']}', '{$user['name']}', '{$user['password']}', '{$user['region']}')
        ";

        $result= $this->execute($query);

        return $this->get($user['uuid']);
    }

    public function getUuidByEmail(string $email) : string
    {
        $query= "
            select uuid from user where email = '{$email}'
        ";
        $result= $this->execute($query);

        $return= $result->fetchObject();
        return ($return)? $return->uuid: '';
    }

    public function login(string $email, string $password) 
    {
        $uuid= $this->getUuidByEmail($email);
        $passCoded= md5("{$uuid}{$password}");
        $query= "
            select uuid, email, name, region, null as password 
            from user where email = '{$email}' and password = '{$passCoded}'
        ";
        $result= $this->execute($query);

        $return= $result->fetchObject();
        return ($return)? $return: new \stdClass();
    }
}