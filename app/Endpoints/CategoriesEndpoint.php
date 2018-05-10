<?php

namespace App\Endpoints;

use App\Endpoints\Endpoints;

class CategoriesEndpoint extends Endpoints
{
    public function init()
    {
        $this->api = 'categories';
    }
}
