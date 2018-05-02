<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\AttachmentRepository;
use App\Repositories\CoursesRepository;
use App\Repositories\GradesRepository;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public $repository = null;
    public $route = null;
    
    public function __construct()
    {
        $this->init();
    }
    
    public function init()
    {
        $this->repository = new CoursesRepository();
        $this->route = 'courses';
    }
    
    /**
     * 列表
     *
     * @param Request $request
     * @param GradesRepository $repository
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
     * @param GradesRepository $repository
     */
    public function edit($id, GradesRepository $repository)
    {
        $item = $this->repository->detail($id);
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
     * @param GradesRepository $repository
     */
    public function create(Request $request, GradesRepository $repository)
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
