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

Route::post('send-comment', 'CompanyController@sendcomment');
Route::post('follow-company', 'CompanyController@follow');
Route::post('unfollow-company', 'CompanyController@unfollow');
Route::resource('companies', 'CompanyController');
Route::resource('jobs', 'JobController');

Route::resource('admin/posts', 'Admin\\PostsController');

// Check role in route middleware
Route::group(['middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
   	Route::get('admin', 'Admin\AdminController@index');
	Route::get('admin/give-role-permissions', 'Admin\AdminController@getGiveRolePermissions');
	Route::post('admin/give-role-permissions', 'Admin\AdminController@postGiveRolePermissions');
	Route::resource('admin/roles', 'Admin\RolesController');
	Route::resource('admin/permissions', 'Admin\PermissionsController');
	Route::resource('admin/users', 'Admin\UsersController');
	Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
	Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
	Route::resource('admin/city', 'City\\CityController');
});