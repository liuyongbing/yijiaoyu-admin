<?php
namespace App\Repositories;

use App\Endpoints\ApplyEndpoint;

class ApplyRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new ApplyEndpoint();
    }
}