<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class AttachmentEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'attachment/upload/courseware';
    }
    
    public static $filetype = 'common';
    
    public static function setFiletype($filetype)
    {
        self::$filetype = $filetype;
    }
    
    public static function getApi()
    {
        $api = static::API . '/' . self::$filetype;
        return $api;
    }
}
