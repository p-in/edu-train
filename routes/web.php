<?php

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

Route::get('page/{id}/{slug}', function( $id, $slug ){
    return '页面ID' . $id . $slug;
}) -> where(['id'=>'[0-9]+', 'slug'=>'[a-zA-Z]+']);

// 隐式 路由模型绑定
Route::get('task/{task}', function (\App\Models\Task $task) {
    dd($task); // 打印 $task 明细
});

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/user', function () {
        //
    });
});