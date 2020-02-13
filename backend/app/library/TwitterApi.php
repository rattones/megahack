<?php
namespace app\library;

use core\library\TwitterApi\Twitter;
use Exception;

class TwitterApi extends Twitter
{

    public function __construct()
    {
        extract(parse_ini_file(APP_PATH.'..\\data\\twitter-token.ini'));
        try {
            parent::__construct($api_key, $api_secret_key); # testing, $access_token, $access_secret_token);

        } catch (Exception $e) {
            \debug($e);
            echo 'usuário não autenticado';
            die;
        }
    }

}