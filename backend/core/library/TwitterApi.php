<?php
namespace core\library;

use Exception;

class curl
{
    private $url;
    private $baseUrl;
    private $returnTransfer;
    private $encoding;
    private $maxRedirs;
    private $timeout;
    private $httpVersion;
    private $customRequest;
    private $postFields;    // string url encoded
    private $cookie;
    private $httpHeader;

    public function __construct(array $options) {
        $this->url=             "";
        $this->baseUrl=         (isset($options['baseUrl']))?         $options['baseUrl']:                "";
        $this->returnTransfer=  (isset($options['returnTransfer']))?  $options['returnTransfer']:         true;
        $this->encoding=        (isset($options['encoding']))?        $options['encoding']:               "";
        $this->maxRedirs=       (isset($options['maxRedirs']))?       $options['maxRedirs']:              10;
        $this->timeout=         (isset($options['timeout']))?         $options['timeout']:                30;
        $this->httpVersion=     (isset($options['httpVersion']))?     $options['httpVersion']:            CURL_HTTP_VERSION_1_1;
        $this->customRequest=   (isset($options['customRequest']))?   $options['customRequest']:          "GET";
        $this->postFields=      "";
        $this->cookie=          (isset($options['cookie']))?          $options['cookie']:                 "";
        $this->httpHeader=      (isset($options['httpHeader']))?      $options['httpHeader']:             array();
    
    }

    public function exect() 
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL =>            $this->url,
          CURLOPT_RETURNTRANSFER => $this->returnTransfer,
          CURLOPT_ENCODING =>       $this->encoding,
          CURLOPT_MAXREDIRS =>      $this->maxRedirs,
          CURLOPT_TIMEOUT =>        $this->timeout,
          CURLOPT_HTTP_VERSION =>   $this->httpVersion,
          CURLOPT_CUSTOMREQUEST =>  $this->customRequest,
          CURLOPT_POSTFIELDS =>     $this->postFields,
          CURLOPT_COOKIE =>         $this->cookie, # "personalization_id=%22v1_PIGpzDp6gNCrPzecIO1Hpg%3D%3D%22; guest_id=v1%253A158152528365649012; lang=pt",
          CURLOPT_HTTPHEADER =>     $this->httpHeader
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          return ["cURL Error #:" => $err];
        } else {
          return json_decode($response);
        }
    }

    public function get(string $endPoint, $data= null) 
    {
        $this->customRequest= "GET";
        $this->url= "{$this->baseUrl}{$endPoint}";

        if (is_array($data)) {   
            foreach($data as $key=>$value) {
                $this->postFields.= "{$key}".urlencode($value);
            }
        } elseif (is_string($data)) {

        } else {
            throw new Exception("Data should be array or string '".type($data)."' given.");
        }
    }

    public function post(string $endPoint, array $data) 
    {
        $this->customRequest= "POST";
        $this->url= "{$this->baseUrl}{$endPoint}";

        foreach($data as $key=>$value) {
            $this->postFields.= "{$key}".urlencode($value);
        }
    }

    public function get(string $endPoint) 
    {
        $this->customRequest= "GET";
        $this->url= "{$this->baseUrl}{$endPoint}";
    }

    public function get(string $endPoint) 
    {
        $this->customRequest= "GET";
        $this->url= "{$this->baseUrl}{$endPoint}";
    }
}

function curl()
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.twitter.com/1.1/account/verify_credentials.json",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_COOKIE => "", # "personalization_id=%22v1_PIGpzDp6gNCrPzecIO1Hpg%3D%3D%22; guest_id=v1%253A158152528365649012; lang=pt",
      CURLOPT_HTTPHEADER => array(
        "authorization: OAuth oauth_consumer_key=\"UqpAeFgHhdLTPTPWJTBQflOb8\", oauth_nonce=\"EJvjwrVTV6s98PfOavLGneYknkHxy7RT\", oauth_signature=\"7aAmqc5rEnQOMf44In5WYC%2BNV%2Bs%3D\", oauth_signature_method=\"HMAC-SHA1\", oauth_timestamp=\"1581573698\", oauth_token=\"34467533-qiidnHdMt9NkpFVzoUyo4clybmZQXhGe3lyeWOaxd\", oauth_version=\"1.0\""
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      return ["cURL Error #:" => $err];
    } else {
      return json_decode($response);
    }

}
