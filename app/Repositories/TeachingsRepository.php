<?php

namespace App\Repositories;

use App\Endpoints\TeachingsEndpoint;
use App\Repositories\Repository;

class TeachingsRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new TeachingsEndpoint();
    }
}