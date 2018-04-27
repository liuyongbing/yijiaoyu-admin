<?php

namespace App\Repositories;

use App\Endpoints\GradesEndpoint;
use App\Repositories\Repository;

class GradesRepository extends Repository
{
    public function list($params = [])
    {
        return GradesEndpoint::list($params);
    }
    
    public function detail($id)
    {
        return GradesEndpoint::detail($id);
    }
    
    public function update($id, $params = [])
    {
        return GradesEndpoint::update($id, $params);
    }
}