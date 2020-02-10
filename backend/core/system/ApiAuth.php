<?php
namespace core\system;

use Exception;

class ApiAuth
{
    static private $token= null;
    static private $timestamp= null;
    static private $passToken= null;

    public function auth() : bool
    {
        try {
            if ( !isset($_SERVER['HTTP_AUTHORIZATION']) ) {
                return false;
                // return true; # testing in browser
            }
            $arr= explode(' ', $_SERVER['HTTP_AUTHORIZATION']);
            self::$timestamp= $arr[0];
            self::$token= $arr[1];
    
            self::$passToken= $_SERVER['HTTP_PASS_TOKEN'];
    
        } catch (Exception $e) {
            \debug($e);
        }
        // \debug([self::$token, self::$timestamp, self::$webjump]);
        return ( !is_null(self::$token) and
                 !is_null(self::$timestamp) and
                 !is_null(self::$passToken) );
        // return true; # testing in browser
    }
}