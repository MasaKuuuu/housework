<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Housework;
use App\Services\HouseWorkService;
use App\Models\Obj\Task;

class HomeController extends Controller
{
    public function index(HouseWorkService $houseWorkService)
    {
        $todayTasks = [];
        $fixTasks = [];
        $passTasks = [];
        // $housework = new Housework;
        // foreach($housework->all() as $task){
        //     var_dump($task);
        //     $taskArray[] = $houseWorkService->getTaskExecutionDate($task);
        // }

        $housework = new Housework;
        foreach($housework->all() as $housework){
            $tasks[] = new Task($housework);
        }

        foreach($tasks as $task){
            switch($task->limit){
                case env('TASK_LIMIT_TODAY'):
                    $todayTasks[] = $task;
                    break;
                case env('TASK_LIMIT_FIX'):
                    $fixTasks[] = $task;
                    break;
                case env('TASK_LIMIT_PASS'):
                    $passTasks[] = $task;
                    break;
            }
        }

        $today = date("Y-m-d");
        
        // ここの部分、クエリビルダにするのではなくSQL直接書いたほうが良いと思われ
        // INTERVAL の設定がわからないため
        // 当日実施タスク
        // $todayTasks = DB::table('houseworks')->leftJoin('task_executions', 'houseworks.id', '=', 'task_executions.task_id')->where("task_executions.created_at", '=', $today)->select('houseworks.id','houseworks.task_name','houseworks.term','houseworks.point')->orderby('task_executions.created_at', 'desc')->limit(1)->get();
        // $todayTasks = DB::table('houseworks')->leftJoin('task_executions', 'houseworks.id', '=', 'task_executions.task_id')->whereNull('task_executions.created_at')->select('houseworks.id','houseworks.task_name','houseworks.term','houseworks.point')->orderby('task_executions.created_at', 'desc')->limit(1)->get();

        // // 完了タスク
        // $fixTasks = DB::table('houseworks')->leftJoin('task_executions', 'houseworks.id', '=', 'task_executions.task_id')->where('task_executions.created_at', '>', $today)->orderby('task_executions.created_at', 'desc')->limit(1)->get();

        // // 実施日が過ぎているタスク
        // $passTasks = DB::table('houseworks')->leftJoin('task_executions', 'houseworks.id', '=', 'task_executions.task_id')->where('task_executions.created_at', '<', $today)->orderby('task_executions.created_at', 'desc')->limit(1)->get();

        // 本当はview側でオブジェクトを識別して表示するようにしたい
        return view('home',['todayTasks' => $todayTasks, 'fixTasks' => $fixTasks, 'passTasks' => $passTasks]);
    }
}
