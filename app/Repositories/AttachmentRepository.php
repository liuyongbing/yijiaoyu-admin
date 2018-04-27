<?php

namespace App\Repositories;

use App\Endpoints\AttachmentEndpoint;
use App\Repositories\Repository;

class AttachmentRepository extends Repository
{
    public function upload($params = [])
    {
        return AttachmentEndpoint::upload($params);
    }
    
    public function setFiletype($filetype = 'common')
    {
        AttachmentEndpoint::setFiletype($filetype);
    }
}