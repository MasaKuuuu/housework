<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseworkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class, 'index']);

// ホーム画面
Route::get('/home', [HomeController::class, 'index']);

// 新規作成画面
Route::get('/create', [HouseworkController::class, 'create']);

// 登録処理
Route::post('/insert', [HouseworkController::class, 'insert']);

// タスク完了処理
Route::middleware(['auth:sanctum', 'verified'])->get('/fixTask', [HouseworkController::class, 'insertTaskExectionDate']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
