<?php

namespace App\Repositories;

use App\Endpoints\BranchesEndpoint;
use App\Repositories\Repository;

class BranchesRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new BranchesEndpoint();
    }
}