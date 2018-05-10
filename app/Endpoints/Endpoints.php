<?php

namespace App\Endpoints;

use App\Facades\ApiClient;

class Endpoints
{
    const API_VERSION = 1;
    
    public $api;
    
    public function __construct()
    {
        $this->init();
    }
    
    public function init()
    {
        $this->api = '';
    }
    
    /**
     * 列表
     * 
     * @param array $params
     * @return array
     */
    public function list($params)
    {
        $response = ApiClient::get($this->api, $params);
        
        return $this->response($response);
    }
    
    /**
     * 详情
     * 
     * @param int $id
     * @return array
     */
    public function detail($id)
    {
        $response = ApiClient::get($this->api . '/' . $id);
        
        return $this->response($response);
    }
    
    /**
     * 新增
     * 
     * @param array $data
     * @return array
     */
    public function store($data)
    {
        $response = ApiClient::post($this->api, $data, static::headers());
        
        return $this->response($response);
    }
    
    /**
     * 修改
     * 
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update($id, $data)
    {
        $url = $this->api . '/' . $id;
        $response = ApiClient::put($url, $data, static::headers());
        
        return $this->response($response);
    }
    
    /**
     * 上传
     * 
     * @param array $data
     * @return array
     */
    public function upload($data)
    {
//var_dump($this->api);
//print_r($data);exit();
        $response = ApiClient::upload($this->api, $data, static::headers());
        
        return $this->response($response);
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
        $response = ApiClient::get($this->api, $params);
        
        return $this->response($response);
    }
    
    /**
     * Handle error
     * 
     * @param array $response
     * @return array
     */
    public static function handleError($response)
    {
        throw new \Exception($response['result']['message']);
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
    protected function response($response)
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