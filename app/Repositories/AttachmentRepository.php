<?php

namespace App\Repositories;

use App\Endpoints\AttachmentEndpoint;
use App\Repositories\Repository;

class AttachmentRepository extends Repository
{
    public function init()
    {
        $this->endPoint = new AttachmentEndpoint();
    }
    
    public function upload($params = [])
    {
        return $this->endPoint->upload($params);
    }
    
    public function setFiletype($filetype = 'common')
    {
        $this->endPoint->setFiletype($filetype);
    }
}