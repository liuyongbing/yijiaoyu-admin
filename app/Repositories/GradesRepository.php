<?php

namespace App\Repositories;

use App\Endpoints\GradesEndpoint;
use App\Repositories\Repository;

class GradesRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new GradesEndpoint();
    }
    
    /**
     * 列表
     * 
     * @param array $params
     * @return array
     */
    public function list($params = [], $page = 1, $size = 10, $order = 'sort')
    {
        $params['page'] = $page;
        $params['size'] = $size;
        $params['order'] = $order;
        
        return $this->endPoint->list($params);
    }
    
    /**
     * 详情
     * 
     * @param int $id
     * @return array
     */
    public function detail($id)
    {
        return $this->endPoint->detail($id);
    }
}