<?php
namespace app\model;

use core\system\Model;

class MessageModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(string $uuid) : \stdClass
    {
        $query= "select * from message where uuid = '{$uuid}'";
        $result= $this->execute($query);

        $return= $result->fetchObject();
        return ($return)? $return: new \stdClass();
    }

    public function getByUser(string $uuid) : array
    {
        $query= "select * from message where userUuid = '{$uuid}'";
        $result= $this->execute($query);

        $return= [];
        while ( $row= $result->fetchObject() )
        {
            $return[]= $row;
        }

        return $return;
    }

    public function add(array $message) : \stdClass
    {
        $message['uuid']= md5(uniqid(rand(), true));
        $message['sendAt']= date('YmdHis');

        $query= "
            insert into message (uuid, userUuid, sendAt, message)
            values ('{$message['uuid']}', '{$message['userUuid']}', '{$message['sendAt']}', '{$message['message']}')
        ";

        $result= $this->execute($query);

        return $this->get($message['uuid']);
    }
}