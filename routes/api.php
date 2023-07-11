<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('nama', function () {
    return 'Namaku, Larashop API';
});

Route::post('umur', function () {
    return 17;
});

Route::get('category/{id}', function ($id) {
    $categories = [
        1 => 'Programming',
        2 => 'Desain Grafis',
        3 => 'Jaringan Komputer',
    ];
    $id = (int) $id;
    if($id==0) return 'Silakan pilih kategori';
    else return 'Anda memilih kategori <b>'.$categories[$id].'</b>';
});
Route::middleware('throttle:10,1')->group(function () {
Route::get('buku/{judulbaru}','App\Http\Controllers\APIBookController@cetak');
});

Route::get('book/{id}', function () {
    return 'buku angka';
})->where('id', '[0-9]+');

Route::prefix('v1')->group(function () {
    // public
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('register', 'App\Http\Controllers\AuthController@register');

    Route::get('books', 'App\Http\Controllers\APIBookController@index');
    Route::get('book/{id}', 'App\Http\Controllers\APIBookController@view')->where('id', '[0-9]+');

    Route::get('categories/random/{count}', 'App\Http\Controllers\APICategoryController@random');
    Route::get('books/top/{count}', 'App\Http\Controllers\APIBookController@top');

    // auth
    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', 'App\Http\Controllers\AuthController@logout');

        //...
    });
    
});
