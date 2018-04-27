<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
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
        $page = $request->input('page', 1);
        $size = Dictionary::PAGE_SIZE;
        
        $results = $repository->list([], $page, $size);
        
        return view('grade.index', [
            'items'         => isset($results['list']) ? $results['list'] : [],
            'filters'       => [],
            'pagination' => [
                'route' => 'grades.index',
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
     * 修改 put
     * 
     * @param Request $request
     * @param GradesRepository $repository
     * @param int $id
     */
    public function update(Request $request, GradesRepository $repository, $id)
    {
        $data = $request->input('Record');

        $response = $repository->update($id, $data);

        return redirect()->route('grades.index');
    }
    
    /**
     * 新增
     * 
     * @param Request $request
     * @param GradesRepository $repository
     */
    public function create(Request $request, GradesRepository $repository)
    {
        return view('grade.add', [
            'item' => []
        ]);
    }
    
    /**
     * 新增 post
     * 
     * @param Request $request
     * @param GradesRepository $repository
     */
    public function store(Request $request, GradesRepository $repository)
    {
        $data = $request->input('Record');
        
        $response = $repository->store($data);
        
        return redirect()->route('grades.index');
    }
    
    /**
     * 查看
     * 
     * @param unknown $id
     * @param GradesRepository $repository
     */
    public function show($id, GradesRepository $repository)
    {
        return $repository->detail($id);
    }
}
