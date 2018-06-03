<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\ApplyRepository;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function init()
    {
        $this->repository = new ApplyRepository();
        
        $this->route = 'apply';
    }
    
    /**
     * 列表
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $size = Dictionary::PAGE_SIZE;
        
        $order = ['id' => 'desc'];
        $results = $this->repository->list([], $page, $size, $order);
        
        return view($this->route . '.list', [
                'route' => $this->route,
                'items' => isset($results['list']) ? $results['list'] : [],
                'filters' => [],
                'pagination' => [
                        'route' => $this->route . '.index',
                        'page' => $page,
                        'size' => $size,
                        'total' => isset($results['total']) ? $results['total'] : 0
                ]
        ]);
    }
}