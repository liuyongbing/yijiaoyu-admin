<?php
namespace App\Repositories;

use App\Endpoints\CategoriesEndpoint;

class CategoriesRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new CategoriesEndpoint();
    }
}