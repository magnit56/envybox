<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
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
    return view('example');
});

Route::get('/applications', function () {
    return \App\Models\Application::all();
});

Route::get('/test', function () {
    echo 'Connected to database: ' . DB::connection()->getDatabaseName() . '<br>';
    echo 'Visitors count: ' . Redis::incr('visitorsCount');
});
