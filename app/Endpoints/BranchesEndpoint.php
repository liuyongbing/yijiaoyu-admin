<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class BranchesEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'branches';
    }
}
