<?php
namespace App\Repositories;

use App\Endpoints\SmsEndpoint;

class SmsRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new SmsEndpoint();
    }
    
    /**
     * 短信发送
     * 
     * @param string $mobile
     * @param string $message
     * @param string $action    用途
     * @return array
     */
    public function send($mobile, $message, $action)
    {
        $params = [
            'mobile' => $mobile,
            'message' => $message,
            'action' => $action,
        ];
        
        return $this->endPoint->sms($params);
    }
}