<?php

namespace App\Http\Controllers;

use App\Repositories\AccountsRepository;
use Illuminate\Http\Request;
use App\Constants\Dictionary;

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
        
        $results = $this->repository->list([], $page, $size);
        
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
        
        $repository = new CoursesRepository();
        //$courseId = $request->input('course_id');
        $course = $repository->detail($item['course_id']);
        
        return view($this->route . '.edit', [
            'route' => $this->route,
            'item' => $item,
            'course' => $course
        ]);
    }
    
    /**
     * 修改 put
     *
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $data = $request->input('Record');
        $data['image'] = $this->upload($request);
        //echo '<pre>';print_r($data);exit();
        $response = $this->repository->update($id, $data);
        
        return redirect()->route($this->route . '.index');
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
