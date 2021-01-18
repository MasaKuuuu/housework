<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Housework;
use App\Models\TaskExecution;
use Illuminate\Support\Facades\Auth;

class HouseworkController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function insert(Request $request)
    {
        $houseWork = new Housework;
        $houseWork->task_name = $request->task_name;
        $houseWork->term = $request->term;
        $houseWork->point = $request->point;
        $houseWork->save();
        return redirect('home');
    }

    public function insertTaskExectionDate(Request $request)
    {
        $user = Auth::user();
        $taskExection = new TaskExecution;
        $taskExection->task_id = $request->task_id;
        $taskExection->user_id = $user->id;
        $taskExection->save();
        return redirect('home');
    }
}
