<?php
namespace App\Services;

use App\Models\Housework;
use App\Models\TaskExecution;

class HouseWorkService {
    public static function getTaskExecutionDate(Housework $task):int
    {
        $limit;
        $today = date("Y/m/d 00:00:00");
        $taskExecutionHistory = TaskExecution::where('task_id', $task->id)->orderBy('created_at', 'desc')->limit(1)->first();

        // 一度も完了したことがないタスクの場合
        if(is_null($taskExecutionHistory)){
            $limit = env('TASK_LIMIT_TODAY');
        }else{
            $taskExecutionDate = date(date('Y/m/d h:i:s',strtotime($taskExecutionHistory->created_at)), strtotime($task->term . " day"));
            // 完了舌タスクの場合
            //// 完了済みのタスクの場合
            if($today < $taskExecutionDate){
                $limit = env('TASK_LIMIT_FIX');
            }else{
                $today = date("Y/m/d");
                $taskExecutionDate = date(date('Y/m/d',strtotime($taskExecutionHistory->created_at)), strtotime($task->term . " day"));

                //// 今日が実行日の場合
                if($today === $taskExecutionDate){
                    $limit = env('TASK_LIMIT_TODAY');
                //// 実行日が過ぎている場合
                }else{
                    $limit = env('TASK_LIMIT_PASS');
                }
            }
        }

        return $limit;
    }
}