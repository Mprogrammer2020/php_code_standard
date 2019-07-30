<?php

use Illuminate\Http\Request;

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
Route::post('login', 'Api\AdminController@login')->name('login');
Route::post('allusers', 'Api\AdminController@Allusers')->name('allusers');
Route::post('profile', 'Api\AdminController@MyProfile')->name('profile');
Route::post('viewUser', 'Api\AdminController@viewUser')->name('viewUser');
Route::post('delete', 'Api\AdminController@deleteUser')->name('delete');
