<?php

namespace App\Http\Controllers;

use App\Repositories\AttachmentRepository;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function upload(Request $request, AttachmentRepository $repository)
    {
        $data = [];
        
        $file = $_FILES['my_file'];
        if (!empty($file['name'])) {
            $data = [
                'name'     => 'upload_file',
                'contents' => fopen($file['tmp_name'], 'r'),
                'filename' => $file['name']
            ];
        }
        
        $repository->setFiletype('courseware');
        $response = $repository->upload($data);
        return $this->response($response);
    }
    
    public function demo()
    {
        return view('attachment.upload');
    }
}
