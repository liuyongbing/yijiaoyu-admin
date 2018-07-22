<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\GradesRepository;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    const BRAND_ID = 0;
    
    public function init()
    {
        $this->repository = new GradesRepository();
        
        $this->route = 'grades';
    }
    
    /**
     * 列表
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        $brandId = $request->input('brand_id', 0);
        $page = $request->input('page', 1);
        $size = Dictionary::PAGE_SIZE;
        $offset = ($page - 1) * $size;
        
        $params = [
            'brand_id' => !empty($brandId) ? $brandId : static::BRAND_ID
        ];
        
        $results = $this->repository->list($params, $offset, $size);
        
        return view($this->route . '.list', [
            'route' => $this->route,
            'items' => isset($results['list']) ? $results['list'] : [],
            'filters' => [],
            'brandId' => static::BRAND_ID,
            'pagination' => [
                'route' => $this->route . '.index',
                'page' => $page,
                'size' => $size,
                'total' => isset($results['total']) ? $results['total'] : 0
            ]
        ]);
    }
    
    /**
     * 新增
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $brandId = $request->input('brand_id', 0);
        
        return view($this->route . '.add', [
            'route' => $this->route,
            'item' => [
                'brand_id' => $brandId,
                'status' => 1
            ]
        ]);
    }
    
    /**
     * 修改 put
     * 
     * @param Request $request
     * @param GradesRepository $repository
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $data = $request->input('Record');
        
        $data['image'] = $this->upload($request);
        
        $response = $this->repository->update($id, $data);

        return redirect()->route($this->route . '.index', [
            'brand_id' => $data['brand_id']
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
            'brand_id' => $data['brand_id']
        ]);
    }
}
