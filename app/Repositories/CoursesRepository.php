<?php

namespace App\Repositories;

use App\Endpoints\CoursesEndpoint;
use App\Repositories\Repository;

class CoursesRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new CoursesEndpoint();
    }
}