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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['guest']], function () {
	Route::get('/', 'Admin\UserController@index')->name('user.login');
	Route::post('/check-login', 'Admin\UserController@checkLogin')->name('user.check-login');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
	 Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
	 Route::get('home', 'Admin\DashboardController@home')->name('home');
	 Route::get('logout', 'Admin\UserController@logout')->name('logout');
	 Route::get('view', 'Admin\UserController@adminview')->name('admin.view');
	 Route::POST('changePassword', 'Admin\UserController@changePassword')->name('admin.changePassword');
	 Route::post('update', 'Admin\UserController@update')->name('admin.update');
	 Route::get('allusers', 'Admin\UserController@Allusers')->name('admin.userlist');
	 Route::get('delete/{id}', 'Admin\UserController@deleteuser')->name('admin.delete');
	 Route::get('edituser/{id}', 'Admin\UserController@userEdit')->name('admin.useredit');
	 Route::post('updateuser', 'Admin\UserController@upateuser')->name('admin.updateuser');
	 Route::get('UserView/{id}', 'Admin\UserController@UserView')->name('admin.userView');

});
