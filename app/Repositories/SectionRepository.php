<?php
namespace App\Repositories;

use App\Endpoints\SectionEndpoint;

class SectionRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new SectionEndpoint();
    }
}