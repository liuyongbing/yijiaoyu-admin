<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\AccountsRepository;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function init()
    {
        $this->repository = new AccountsRepository();
        
        $this->route = 'accounts';
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
        $offset = ($page - 1) * $size;
        
        $results = $this->repository->list([], $offset, $size);
        
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
     * 修改 view
     *
     * @param int $id
     */
    public function edit(Request $request, $id)
    {
        $item = $this->repository->detail($id);
        
        $accountTypes = Dictionary::ACCOUNT_TYPE;
        
        return view($this->route . '.edit', [
            'route' => $this->route,
            'item' => $item,
            'accountTypes' => $accountTypes
        ]);
    }
    
    /**
     * 新增
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $accountTypes = Dictionary::ACCOUNT_TYPE;
        
        return view($this->route . '.add', [
            'route' => $this->route,
            'item' => [
                'status' => 1
            ],
            'accountTypes' => $accountTypes
        ]);
    }
}
