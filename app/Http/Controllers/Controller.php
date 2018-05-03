<?php

namespace App\Http\Controllers;

use App\Repositories\AttachmentRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\Repository;
use App\Constants\Dictionary;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public $repository;
    public $route;
    
    public function __construct()
    {
        $this->init();
    }
    
    public function init()
    {
        $this->repository = new Repository();
        
        $this->route = '';
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
            'items'         => isset($results['list']) ? $results['list'] : [],
            'filters'       => [],
            'pagination' => [
                'route' => $this->route . '.index',
                'page' => $page,
                'size' => $size,
                'total' => isset($results['total']) ? $results['total'] : 0
            ]
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
        
        $response = $this->repository->update($id, $data);
        
        return redirect()->route($this->route . '.index');
    }
    
    /**
     * 修改 view
     *
     * @param int $id
     */
    public function edit($id)
    {
        $item = $this->repository->detail($id);
        
        return view($this->route . '.edit', [
            'item' => $item
        ]);
    }
    
    /**
     * 新增
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        return view($this->route . '.add', [
            'item' => [
                'status' => 1
            ]
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
        
        $response = $this->repository->store($data);
        
        return redirect()->route($this->route . '.index');
    }
    
    /**
     * 附件上传
     * 
     * @param Request $request
     * @param AttachmentRepository $repository
     * @return mixed
     */
    public function upload(Request $request)
    {
        $filename = $request->input('Record')['image'];
        
        $file = $_FILES['upload_file'];
        if (!empty($file['name'])) {
            $data = [
                'name'     => 'upload_file',
                'contents' => fopen($file['tmp_name'], 'r'),
                'filename' => $file['name']
            ];
            $repository = new AttachmentRepository();
            $repository->setFiletype('courseware');
            $result = $repository->upload($data);
            if (!empty($result['filename'])) {
                $filename = $result['filename'];
            }
        }
        
        return $filename;
    }
    
    public function response($response)
    {
        return $response;
    }
}
