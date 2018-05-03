<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class GradesEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'grades';
    }
}
