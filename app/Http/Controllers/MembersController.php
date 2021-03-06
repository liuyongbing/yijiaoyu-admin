<?php

namespace App\Http\Controllers;

use App\Constants\Dictionary;
use App\Repositories\MembersRepository;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function init()
    {
        $this->repository = new MembersRepository();
        
        $this->route = 'members';
    }
    
    /**
     * 列表
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        $brandId = $request->input('brand_id', 0);
        $teamType = $request->input('team_type', 0);
        $username = $request->input('username', '');
        $status = $request->input('status', '');
        
        $page = $request->input('page', 1);
        $size = Dictionary::PAGE_SIZE;
        $offset = ($page-1) * $size;
        
        $brands = Dictionary::$brand;
        $teams = Dictionary::$teamTypes;
        
        $filters = [
            'brand_id' => 0,
            'team_type' => 0,
            'username' => '',
            'status' => '',
        ];
        
        $params = [];
        if (!empty($brandId))
        {
            $params['brand_id'] = $brandId;
        }
        if (!empty($teamType))
        {
            $params['team_type'] = $teamType;
        }
        if (!empty($username))
        {
            $params['username'] = $username;
        }
        if (is_numeric($status))
        {
            $params['status'] = $status;
        }
        $filters = array_merge($filters, $params);
        
        $orderBy = [
            'brand_id' => 'asc',
            'team_type' => 'asc',
            'sort' => 'asc',
        ];
        $results = $this->repository->list($params, $offset, $size, $orderBy);
        
        return view($this->route . '.list', [
            'route' => $this->route,
            'items' => isset($results['list']) ? $results['list'] : [],
            'brands' => $brands,
            'teams' => $teams,
            'filters' => $filters,
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
        $brands = Dictionary::$brand;
        $teams = Dictionary::$teamTypes;
        
        return view($this->route . '.add', [
            'route' => $this->route,
            'brands' => $brands,
            'teams' => $teams,
            'item' => [
                'status' => 1
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
        
        $brands = Dictionary::$brand;
        $teams = Dictionary::$teamTypes;
        
        return view($this->route . '.edit', [
            'route' => $this->route,
            'brands' => $brands,
            'teams' => $teams,
            'item' => $item
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