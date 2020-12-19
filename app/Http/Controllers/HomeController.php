<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Housework;

class HomeController extends Controller
{
    public function index()
    {
        $housework = new Housework;
        return view('home',['tasks' => $housework->all()]);
    }
}
