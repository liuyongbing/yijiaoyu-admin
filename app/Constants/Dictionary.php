<?php

namespace App\Constants;

use App\Constants\Traits\Brand;
use App\Constants\Traits\Filetypes;
use App\Constants\Traits\Gender;
use App\Constants\Traits\Targets;
use App\Constants\Traits\TeamTypes;

class Dictionary
{
    use Brand;//品牌
    use Filetypes;//上传的图片类型
    use Gender;
    use Targets;
    use TeamTypes;//团队类型
    
    const PAGE_SIZE = 10;//页容量
    
    const ACCOUNT_TYPE = [
        'ADMINISTRATOR'         => 1,//超级级管理员
        'EDITOR'                => 2,//普通管理员
        //'TEACHER'               => 3,//教练
        'TEACHER_TAEKWONDO'     => 31,//教练:齐天大圣(跆拳道)
        'TEACHER_POCKETCAT'     => 32,//教练:口袋猫(舞蹈)
        'TEACHER_TOWN'          => 33,//教练:童画镇(绘画)
        'TEACHER_SKATING'       => 34,//教练:学会玩(轮滑)
        'TEACHER_BASKETBALL'    => 35,//教练:晓虎队(篮球)
    ];
}
