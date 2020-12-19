<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Housework;

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
}
