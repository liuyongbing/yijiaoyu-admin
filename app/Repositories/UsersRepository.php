<?php
namespace App\Repositories;

use App\Endpoints\UsersEndpoint;

class UsersRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new UsersEndpoint();
    }
    
    public function login($data = [])
    {
        return $this->endPoint->login($data);
    }
}