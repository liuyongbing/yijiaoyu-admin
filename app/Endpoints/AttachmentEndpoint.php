<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class AttachmentEndpoint extends Endpoints
{
    const API = 'attachment/upload/';
    
    public $filetype = 'common';
    
    public function init()
    {
        $this->api = self::API . $this->filetype;
    }
    
    public function setFiletype($filetype)
    {
        $this->filetype = $filetype;
        
        $this->init();
    }
}
