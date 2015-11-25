<?php
/**
 * Created by PhpStorm.
 * User: Aliaxander
 * Date: 24.11.15
 * Time: 16:25
 */

namespace Ox\Api;

class OxApi
{
    protected $url;
    protected $email;
    protected $apiKey;

    /**
     * OxApi constructor.
     *
     * @param $url
     * @param $email
     * @param $apiKey
     */
    public function __construct($url, $email, $apiKey)
    {
        $this->url = $url;
        $this->email = $email;
        $this->apiKey = $apiKey;
    }

    protected function postApi($method, $request){

    }
    
}