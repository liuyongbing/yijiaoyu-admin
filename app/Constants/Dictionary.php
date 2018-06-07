<?php

namespace App\Constants;

use App\Constants\Traits\Brand;
use App\Constants\Traits\TeamTypes;

class Dictionary
{
    use Brand;//品牌
    use TeamTypes;//团队类型
    
    const PAGE_SIZE = 10;//页容量
    
    const ACCOUNT_TYPE = [
        'ADMINISTRATOR' => 1,//超级级管理员
        'EDITOR'        => 2,//普通管理员
        'TEACHER'       => 3,//教练
    ];
}
