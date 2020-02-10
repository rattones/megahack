<?php
namespace core\system;

class Request 
{
    public static function _GET(string $id= null) : array
    {
        if ( $_SERVER['HTTP_CONTENT_TYPE'] == 'application/json' ) {
            $_GET= json_decode(file_get_contents('php://input'), true);
        }

        if ( !is_null($id) ) {
            return (isset($_GET[$id]))? [$id=>$_GET[$id]]: [];
        } else {
            return $_GET;
        }
    }

    public static function _POST(string $id= null) : array
    {
        if ( $_SERVER['HTTP_CONTENT_TYPE'] == 'application/json' ) {
            $_POST= json_decode(file_get_contents('php://input'), true);
        }

        if ( !is_null($id) ) {
            return (isset($_POST[$id]))? [$id=>$_POST[$id]]: [];
        } else {
            return $_POST;
        }
    }
}