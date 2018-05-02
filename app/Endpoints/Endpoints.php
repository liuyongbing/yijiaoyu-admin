<?php

namespace App\Endpoints;

use App\Facades\ApiClient;

class Endpoints
{
    const API_VERSION = 1;
    
    /**
     * API地址
     * 
     * @return string
     */
    public static function getApi()
    {
        return static::API;
    }
    
    /**
     * 列表
     * 
     * @param array $params
     * @return array
     */
    public function list($params)
    {
        $response = ApiClient::get(static::getApi(), $params);
        
        return static::response($response);
    }
    
    /**
     * 详情
     * 
     * @param int $id
     * @return array
     */
    public static function detail($id)
    {
        $response = ApiClient::get(static::getApi() . '/' . $id);
        
        return static::response($response);
    }
    
    /**
     * 新增
     * 
     * @param array $data
     * @return array
     */
    public static function store($data)
    {
        $response = ApiClient::post(static::getApi(), $data, static::headers());
        
        return static::response($response);
    }
    
    /**
     * 修改
     * 
     * @param int $id
     * @param array $data
     * @return array
     */
    public static function update($id, $data)
    {
        $url = static::getApi() . '/' . $id;
        $response = ApiClient::put($url, $data, static::headers());
        
        return static::response($response);
    }
    
    /**
     * 上传
     * 
     * @param array $data
     * @return array
     */
    public static function upload($data)
    {
        $response = ApiClient::upload(static::getApi(), $data, static::headers());
        
        return static::response($response);
    }
    
    /**
     * 列表 - 所表
     *
     * @param array $params
     * @return array
     */
    public function all($params)
    {
        //TODO: 实现
        $response = ApiClient::get(static::getApi(), $params);
        
        return static::response($response);
    }
    
    /**
     * Handle error
     * 
     * @param array $response
     * @return array
     */
    public static function handleError($response)
    {
        return $response;
    }
    
    /**
     * Format headers
     * 
     * @return array
     */
    public static function headers()
    {
        return ['Accept' => 'application/x..v' . static::API_VERSION . '+json'];
    }
    
    /**
     * 响应处理
     * 
     * @param array $response
     * @return array
     */
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