<?php

namespace App\Repositories;

use App\Endpoints\PositionEndpoint;
use App\Repositories\Repository;

class PositionRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new PositionEndpoint();
    }
}