<?php

namespace App\Endpoints;

use App\Facades\ApiClient;

class Endpoints
{
    const API_VERSION = 1;
    
    public static function list($data)
    {
        $response = ApiClient::get(static::API, $data);

        return static::response($response);
    }

    public static function detail($id)
    {
        $response = ApiClient::get(static::API . '/' . $id);
        
        return static::response($response);
    }

    public static function store($data)
    {
        $response = ApiClient::post(static::API, $data, static::headers());
        
        return static::response($response);
    }

    public static function update($id, $data)
    {
        $url = static::API . '/' . $id;
        $response = ApiClient::put($url, $data, static::headers());
        
        return static::response($response);
    }

    public static function handleError($response)
    {
        return $response;
    }
    
    public static function headers()
    {
        return ['Accept' => 'application/x..v' . static::API_VERSION . '+json'];
    }
    
    protected static function response($response)
    {
        $result = [];
        if ($response['status'] === 'success') {
            $result = $response['result'];
        } else {
            $result = static::handleError($response);
        }
        
        return $result;
    }

}