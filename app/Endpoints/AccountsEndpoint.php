<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;
use App\Facades\ApiClient;

class AccountsEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'accounts/editor';
    }
    
    public function login($data)
    {
        $response = ApiClient::post($this->api . '/login', $data);
        
        return $this->response($response);
    }
}
