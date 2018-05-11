<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;
use App\Facades\ApiClient;

class UsersEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'users';
    }
    
    public function login($data)
    {
        $response = ApiClient::post($this->api . '/login', $data);
        
        return $this->response($response);
    }
}
