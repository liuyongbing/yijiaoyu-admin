<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class NewsEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'news';
    }
}
