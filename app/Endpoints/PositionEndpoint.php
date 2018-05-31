<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class PositionEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'position';
    }
}
