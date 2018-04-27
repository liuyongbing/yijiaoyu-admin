<?php

namespace App\Repositories;

use App\Endpoints\GradesEndpoint;
use App\Repositories\Repository;

class GradesRepository extends Repository
{
    /**
     * 列表
     * 
     * @param array $params
     * @return array
     */
    public function list($params = [])
    {
        return GradesEndpoint::list($params);
    }
    
    /**
     * 详情
     * 
     * @param int $id
     * @return array
     */
    public function detail($id)
    {
        return GradesEndpoint::detail($id);
    }
    
    /**
     * 修改
     * 
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update($id, $data = [])
    {
        return GradesEndpoint::update($id, $data);
    }
    
    /**
     * 增加
     * 
     * @param array $data
     * @return array
     */
    public function store($data = [])
    {
        return GradesEndpoint::store($data);
    }
}