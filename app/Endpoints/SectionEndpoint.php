<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class SectionEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'sections';
    }
}
