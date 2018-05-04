<?php

namespace App\Http\Controllers;

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
     * 修改 view
     * 
     * @param int $id
     */
    public function edit($id)
    {
        $item = $this->repository->detail($id);
        
        $repository = new GradesRepository();
        $grades = $repository->all();
        
        return view($this->route . '.edit', [
            'route' => $this->route,
            'item' => $item,
            'grades' => $grades['list']
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

        return redirect()->route($this->route . '.index');
    }
    
    /**
     * 新增
     * 
     * @param Request $request
     */
    public function create(Request $request)
    {
        $repository = new GradesRepository();
        $grades = $repository->all();
        
        return view($this->route . '.add', [
            'route' => $this->route,
            'item' => [
                'status' => 1
            ],
            'grades' => $grades['list']
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
