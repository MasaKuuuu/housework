<?php

namespace App\Models\Obj;

use App\Models\Housework;
use App\Services\HouseWorkService;

class Task
{

    public Housework $houswork;
    public int $limit;

    function __construct(Housework $houswork){
        $this->houswork = $houswork;
        $this->limit = HouseWorkService::getTaskExecutionDate($this->houswork);
    }


}