<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class TrainersEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'trainers';
    }
}
