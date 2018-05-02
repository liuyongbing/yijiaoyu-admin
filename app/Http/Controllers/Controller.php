<?php

namespace App\Http\Controllers;

use App\Repositories\AttachmentRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function response($response)
    {
        return $response;
    }
    
    protected function upload(Request $request, AttachmentRepository $repository)
    {
        $filename = $request->input('Record')['image'];
        
        $file = $_FILES['upload_file'];
        if (!empty($file['name'])) {
            $data = [
                'name'     => 'upload_file',
                'contents' => fopen($file['tmp_name'], 'r'),
                'filename' => $file['name']
            ];
            $repository->setFiletype('courseware');
            $result = $repository->upload($data);
            if (!empty($result['filename'])) {
                $filename = $result['filename'];
            }
        }
        
        return $filename;
    }
}
