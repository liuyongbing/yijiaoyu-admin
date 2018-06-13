<?php

namespace App\Http\Controllers;

use App\Repositories\BannerRepository;
use App\Repositories\GradesRepository;
use Illuminate\Http\Request;
use App\Constants\Dictionary;
use App\Repositories\PositionRepository;

class BannerController extends Controller
{
    public function init()
    {
        $this->repository = new BannerRepository();
        
        $this->route = 'banner';
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
        $offset = ($page - 1) * $size;
        
        $params = [];
        $orderBy = [
            'position_id' => 'asc',
            'sort' => 'asc',
        ];
        $results = $this->repository->list($params, $offset, $size, $orderBy);
        
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
     * 新增
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        return view($this->route . '.add', [
            'route' => $this->route,
            'item' => [
                'status' => 1
            ],
            'positions' => $this->getPositions()
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
        
        return view($this->route . '.edit', [
            'route' => $this->route,
            'item' => $item,
            'positions' => $this->getPositions()
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
        if (!isset($data['target']))
        {
            $data['target'] = Dictionary::$targets['_self'];
        }
        $data['image'] = $this->upload($request, Dictionary::$filetypes['website']);
        
        $response = $this->repository->update($id, $data);

        return redirect()->route($this->route . '.index');
    }
    
    /**
     * 新增 post
     * 
     * @param Request $request
     */
    public function store(Request $request)
    {
        $data = $request->input('Record');
        if (!isset($data['target']))
        {
            $data['target'] = Dictionary::$targets['_self'];
        }
        $data['image'] = $this->upload($request, Dictionary::$filetypes['website']);
        
        $response = $this->repository->store($data);
        
        return redirect()->route($this->route . '.index');
    }
    
    protected function getPositions()
    {
        $positions = [];
        
        $repository = new PositionRepository();
        $results = $repository->all();
        if (!empty($results['list']))
        {
            $positions = $results['list'];
        }
        
        return $positions;
    }
}
