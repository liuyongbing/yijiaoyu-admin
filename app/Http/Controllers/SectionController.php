<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\SectionRepository;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function init()
    {
        $this->repository = new SectionRepository();
        
        $this->route = 'sections';
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
        
        $params = [];
        $orderBy = [
            'page_id' => 'asc',
            'sort' => 'asc',
        ];
        $results = $this->repository->list($params, $page, $size, $orderBy);
        
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
    
    /**
     * 新增
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $pages = Dictionary::$page;
        
        return view($this->route . '.add', [
            'route' => $this->route,
            'pages' => $pages,
            'item' => [
                'contents' => '',
                'status' => 1
            ]
        ]);
    }
    
    /**
     * 修改 view
     *
     * @param int $id
     */
    public function edit(Request $request, $id)
    {
        $item = $this->repository->detail($id);
        
        $pages = Dictionary::$page;
        
        return view($this->route . '.edit', [
            'route' => $this->route,
            'pages' => $pages,
            'item' => $item
        ]);
    }
}