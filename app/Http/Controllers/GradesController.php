<?php

namespace App\Http\Controllers;

use App\Repositories\GradesRepository;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    /**
     * 班级列表
     *
     * @param Request $request
     * @param GradesRepository $repository
     * @return array
     */
    public function index(Request $request, GradesRepository $repository)
    {
        $results = $repository->list();
        
        return view('grade.index', [
            'items'         => isset($results['list']) ? $results['list'] : [],
            'filters'       => [],
            'page_num'      => 2,
            'itemsCount'    => isset($results['total']) ? $results['total'] : 0,
            'pageSize'      => 20,
        ]);
    }
    
    public function edit($id, GradesRepository $repository)
    {
        $item = $repository->detail($id);
        echo '<pre>';print_r($item);
    }
    
    public function create()
    {
        return __METHOD__;
    }
    
    public function show($id, GradesRepository $repository)
    {
        
    }
}
