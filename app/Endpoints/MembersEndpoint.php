<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class MembersEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'members';
    }
}
