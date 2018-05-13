<?php

namespace App\Repositories;

use App\Endpoints\AccountsEndpoint;
use App\Repositories\Repository;

class AccountsRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new AccountsEndpoint();
    }
}