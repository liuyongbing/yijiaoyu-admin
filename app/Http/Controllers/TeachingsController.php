<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\CoursesRepository;
use App\Repositories\TeachingsRepository;
use Illuminate\Http\Request;

class TeachingsController extends Controller
{
    public function init()
    {
        $this->repository = new TeachingsRepository();
        
        $this->route = 'teachings';
    }
    
    /**
     * 列表
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        $courseId = $request->input('course_id', 0);
        
        $page = $request->input('page', 1);
        $size = Dictionary::PAGE_SIZE;
        
        $params = [
            'course_id' => $courseId
        ];
        $results = $this->repository->list($params, $page, $size);
        
        return view($this->route . '.list', [
            'route' => $this->route,
            'items' => isset($results['list']) ? $results['list'] : [],
            'filters' => [],
            'courseId' => $courseId,
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
        $repository = new CoursesRepository();
        $courseId = $request->input('course_id');
        $course = $repository->detail($courseId);
        
        return view($this->route . '.add', [
            'route' => $this->route,
            'item' => [
                'course_id' => $course['id'],
                'status' => 1
            ],
            'course' => $course
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
        
        return redirect()->route($this->route . '.index');
    }
}
