<?php

namespace App\Repositories;

use App\Endpoints\TrainersEndpoint;
use App\Repositories\Repository;

class TrainersRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new TrainersEndpoint();
    }
}