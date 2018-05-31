<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class BannerEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'banner';
    }
}
