<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class CoursesEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'courses';
    }
}
