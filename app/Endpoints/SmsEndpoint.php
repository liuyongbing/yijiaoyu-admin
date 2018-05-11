<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;
use App\Facades\ApiClient;

class SmsEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'sms/send';
    }
    
    /**
     * 短信
     *
     * @param array $params
     * @return array
     */
    public function sms($params)
    {
        $response = ApiClient::post($this->api, $params);
        
        return $this->response($response);
    }
}
