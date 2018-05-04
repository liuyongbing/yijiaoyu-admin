<?php

namespace App\Http\Controllers;

use App\Repositories\GradesRepository;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function init()
    {
        $this->repository = new GradesRepository();
        
        $this->route = 'grades';
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
