<?php

namespace App\Http\Controllers;

use App\Repositories\TrainersRepository;

class TrainersController extends Controller
{
    public function init()
    {
        $this->repository = new TrainersRepository();
        
        $this->route = 'trainers';
    }
}
