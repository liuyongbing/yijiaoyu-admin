<?php
namespace App\Repositories;

use App\Endpoints\NewsEndpoint;

class NewsRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new NewsEndpoint();
    }
}