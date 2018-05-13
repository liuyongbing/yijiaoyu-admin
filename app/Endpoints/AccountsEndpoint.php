<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class AccountsEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'accounts';
    }
}
