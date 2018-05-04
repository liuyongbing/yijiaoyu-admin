<?php

namespace App\Http\Controllers;

use App\Repositories\BranchesRepository;

class BranchesController extends Controller
{
    public function init()
    {
        $this->repository = new BranchesRepository();
        
        $this->route = 'branches';
    }
}
