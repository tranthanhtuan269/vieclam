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
Route::get('company/info/{id}', 'CompanyController@info');
Route::get('company/jobs/{id}', 'CompanyController@jobs');

Route::get('/getDistrict/{id}', 'HomeController@getDistrict');
Route::get('/getTown/{id}', 'HomeController@getTown');


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
    Route::resource('admin/city', 'CityController');
    Route::resource('admin/district', 'DistrictController');
    Route::resource('admin/town', 'TownController');
    Route::resource('admin/curriculum-vitae', 'CurriculumVitaeController');
    Route::resource('admin/company', 'CompanyController');
    Route::resource('admin/job-type', 'JobTypeController');
    Route::resource('Admin/company-size', 'CompanySizeController');
    Route::resource('admin/job', 'JobController');
});

// Check role in route middleware
Route::group(['middleware' => ['auth', 'roles'], 'roles' => 'poster'], function () {
    Route::get('company/create', 'CompanyController@createCompany');
    Route::post('company/store', 'CompanyController@storeCompany');
    //Route::resource('company/job', 'JobController');
    Route::resource('admin/job', 'JobController');
});
