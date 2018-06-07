<?php
namespace App\Repositories;

use App\Endpoints\MembersEndpoint;

class MembersRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new MembersEndpoint();
    }
}