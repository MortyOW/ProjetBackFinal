<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

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

   return view('films', ['film' => $list]);
});


