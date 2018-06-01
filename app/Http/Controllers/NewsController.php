<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use Illuminate\Http\Request;
use App\Repositories\CategoriesRepository;
use App\Repositories\BranchesRepository;
use App\Constants\Dictionary;

class NewsController extends Controller
{
    public function init()
    {
        $this->repository = new NewsRepository();
        
        $this->route = 'news';
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
            'id' => 'desc',
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
        $cateRep = new CategoriesRepository();
        $categories = $cateRep->all();
        
        $branchRep = new BranchesRepository();
        $branches = $branchRep->all();
        
        return view($this->route . '.add', [
            'route' => $this->route,
            'categories' => isset($categories['list']) ? $categories['list'] : [],
            'branches' => isset($branches['list']) ? $branches['list'] : [],
            'item' => [
                'content' => '',
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
        
        $cateRep = new CategoriesRepository();
        $categories = $cateRep->all();
        
        $branchRep = new BranchesRepository();
        $branches = $branchRep->all();
        
        return view($this->route . '.edit', [
            'route' => $this->route,
            'categories' => isset($categories['list']) ? $categories['list'] : [],
            'branches' => isset($branches['list']) ? $branches['list'] : [],
            'item' => $item
        ]);
    }
}