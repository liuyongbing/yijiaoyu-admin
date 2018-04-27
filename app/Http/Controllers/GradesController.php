<?php

namespace App\Http\Controllers;

use App\Repositories\GradesRepository;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    /**
     * 列表
     *
     * @param Request $request
     * @param GradesRepository $repository
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
    
    /**
     * 修改
     * 
     * @param int $id
     * @param GradesRepository $repository
     */
    public function edit($id, GradesRepository $repository)
    {
        $item = $repository->detail($id);
        
        return view('grade.edit', [
            'item' => $item
        ]);
    }
    
    /**
     * 修改提交
     * 
     * @param Request $request
     * @param GradesRepository $repository
     * @param int $id
     */
    public function update(Request $request, GradesRepository $repository, $id)
    {
        $data = $request->input('Record');

        $response = $repository->update($id, $data);

        return redirect(route('grades.index'));
    }
    
    public function create(Request $request, GradesRepository $repository)
    {
        return __METHOD__;
    }
    
    /**
     * 查看
     * 
     * @param unknown $id
     * @param GradesRepository $repository
     */
    public function show($id, GradesRepository $repository)
    {
        
    }
}
