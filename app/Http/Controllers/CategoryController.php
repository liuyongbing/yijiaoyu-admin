<?php

namespace App\Http\Controllers;

use App\Repositories\CategoriesRepository;

class CategoryController extends Controller
{
    public function init()
    {
        $this->repository = new CategoriesRepository();
        
        $this->route = 'categories';
    }
}