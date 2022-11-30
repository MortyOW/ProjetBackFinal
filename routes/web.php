<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/film', function() {
    $val = 20;
    $list = [];
    for($i=0; $i < $val; $i++) {
        $response = Http::get('https://api.themoviedb.org/3/movie/' . $i . '?api_key=16eb18763928632ac96b6291fa839732&language=en-US');
        if($response->ok()){
            $list[] = $response->json();
        }else{
            $val++;
        }
    }

    return view('mes-films', ['list' => $list]);
});
