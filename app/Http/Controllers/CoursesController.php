<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\CoursesRepository;
use App\Repositories\GradesRepository;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function init()
    {
        $this->repository = new CoursesRepository();
        
        $this->route = 'courses';
    }
    
    /**
     * 列表
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        $gradeId = $request->input('grade_id', 0);
        
        $page = $request->input('page', 1);
        $size = Dictionary::PAGE_SIZE;
        $offset = ($page - 1) * $size;
        
        $params = [
            'grade_id' => $gradeId
        ];
        
        $results = $this->repository->list($params, $offset, $size);
        
        return view($this->route . '.list', [
            'route' => $this->route,
            'items' => isset($results['list']) ? $results['list'] : [],
            'filters' => [],
            'gradeId' => $gradeId,
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
        
        $repository = new GradesRepository();
        $grade = $repository->detail($item['grade_id']);
        
        return view($this->route . '.edit', [
            'route' => $this->route,
            'item' => $item,
            'grade' => $grade
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
        
        $response = $this->repository->update($id, $data);

        return redirect()->route($this->route . '.index', [
            'grade_id' => (int)$data['grade_id']
        ]);
    }
    
    /**
     * 新增
     * 
     * @param Request $request
     */
    public function create(Request $request)
    {
        $gradeId = $request->input('grade_id', 0);
        
        $repository = new GradesRepository();
        $grade = $repository->detail($gradeId);
        
        return view($this->route . '.add', [
            'route' => $this->route,
            'item' => [
                'grade_id' => $grade['id'],
                'status' => 1
            ],
            'grade' => $grade
        ]);
    }
    
    /**
     * 新增 post
     * 
     * @param Request $request
     */
    public function store(Request $request)
    {
        $data = $request->input('Record');
        $data['image'] = $this->upload($request);
        
        $response = $this->repository->store($data);
        
        return redirect()->route($this->route . '.index', [
            'grade_id' => (int)$data['grade_id']
        ]);
    }
}
