<?php

namespace App\Http\Controllers;

use App\Repositories\SmsRepository;
use Illuminate\Http\Request;

/**
 * 短信发送
 */
class SmsController extends Controller
{
    public function init()
    {
        $this->repository = new SmsRepository();
    }
    
    public function send(Request $request)
    {
        $mobile = $request->input('mobile');
        $action = $request->input('action', 'login');
        $message = rand(100000, 999999);
        
        $result = $this->repository->send($mobile, $message, $action);
        
        return $this->response($result);
    }
}
