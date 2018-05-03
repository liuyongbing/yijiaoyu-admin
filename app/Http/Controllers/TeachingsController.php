<?php

namespace App\Http\Controllers;

use App\Repositories\AttachmentRepository;
use App\Repositories\CoursesRepository;
use App\Repositories\GradesRepository;
use App\Repositories\TeachingsRepository;
use Illuminate\Http\Request;

class TeachingsController extends Controller
{
    public $repository = null;
    public $route = null;
    
    public function __construct()
    {
        $this->init();
    }
    
    public function init()
    {
        $this->repository = new TeachingsRepository();
        
        $this->route = 'teachings';
    }
    
    /**
     * 修改 view
     * 
     * @param int $id
     */
    public function edit($id)
    {
        $item = $this->repository->detail($id);
        
        $repository = new CoursesRepository();
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
     * @param GradesRepository $repository
     * @param int $id
     */
    public function update(Request $request, AttachmentRepository $attachmentRepository, $id)
    {
        $data = $request->input('Record');
        $data['image'] = $this->upload($request, $attachmentRepository);
        
        $response = $this->repository->update($id, $data);

        return redirect()->route($this->route . '.index');
    }
    
    /**
     * 新增
     * 
     * @param Request $request
     * @param CoursesRepository $repository
     */
    public function create(Request $request, CoursesRepository $repository)
    {
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
    public function store(Request $request, AttachmentRepository $attachmentRepository)
    {
        $data = $request->input('Record');
        $data['image'] = $this->upload($request, $attachmentRepository);
        
        $response = $this->repository->store($data);
        
        return redirect()->route($this->route . '.index');
    }
    
    /**
     * 查看
     * 
     * @param int $id
     */
    public function show($id)
    {
        return $this->repository->detail($id);
    }
}
