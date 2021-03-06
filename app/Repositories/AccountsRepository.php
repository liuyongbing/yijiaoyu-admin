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
    
    /**
     * 增加
     *
     * @param array $data
     * @return array
     */
    public function store($data = [])
    {
        $params = [
            'user_type' => $data['account_type'],
            'username'  => $data['account'],
            'name'      => $data['name'],
            'status'    => $data['status'],
        ];
        return $this->endPoint->store($params);
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
        $params = [
            'user_type' => $data['account_type'],
            'username'  => $data['account'],
            'name'      => $data['name'],
            'status'    => $data['status'],
        ];
        return $this->endPoint->update($id, $params);
    }
    
    public function login($data = [])
    {
        return $this->endPoint->login($data);
    }
}