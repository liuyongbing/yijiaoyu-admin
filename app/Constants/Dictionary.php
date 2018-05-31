<?php

namespace App\Constants;

use App\Constants\Traits\Filetypes;
use App\Constants\Traits\Targets;

class Dictionary
{
    use Filetypes;//上传的图片类型
    use Targets;
    
    const PAGE_SIZE = 10;//页容量
    
    const ACCOUNT_TYPE = [
        //'ADMINISTRATOR' => 1,//超给级管理员
        'EDITOR' => 2,//普通管理员
        'TEACHER' => 3,//教练
    ];
}
