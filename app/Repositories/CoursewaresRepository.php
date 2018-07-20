<?php

namespace App\Repositories;

use App\Endpoints\CoursewaresEndpoint;
use App\Repositories\Repository;

class CoursewaresRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new CoursewaresEndpoint();
    }
}