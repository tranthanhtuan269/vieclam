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
  
Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@welcome')->name('home');
Route::get('auth/facebook', 'Auth\RegisterController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\RegisterController@handleFacebookCallback');
Route::get('auth/google', 'Auth\RegisterController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\RegisterController@handleGoogleCallback');
Route::post('auth/login', 'SiteController@loginApi');
Route::post('auth/register', 'SiteController@registerApi');
Route::get('curriculumvitae', 'CurriculumVitaeController@indexCurriculumVitae');
Route::get('curriculumvitae/view/{id}', 'CurriculumVitaeController@showCurriculumVitae');
Route::get('/job/view/{id}', 'JobController@info');
Route::post('/job/join', 'JobController@join');
Route::get('company/{id}/info', 'CompanyController@info');
Route::get('company/{id}/listjobs', 'CompanyController@listjobs');

Route::group(['middleware' => 'auth'], function(){

    Route::post('send-comment', 'CompanyController@sendcomment');
    Route::post('follow-company', 'CompanyController@follow');
    Route::post('unfollow-company', 'CompanyController@unfollow');
    
    Route::get('/getDistrict/{id}', 'HomeController@getDistrict');
    Route::get('/getTown/{id}', 'HomeController@getTown');

    // Check role in route middleware
    Route::get('curriculumvitae/create', 'CurriculumVitaeController@createCurriculumVitae');
    Route::post('curriculumvitae/store', 'CurriculumVitaeController@storeCurriculumVitae');
    Route::post('/postImage', 'HomeController@postImage');
    Route::post('/curriculumvitae/send-comment', 'CurriculumVitaeController@sendcomment');
});

// Check role in route middleware
Route::group(['middleware' => ['auth', 'roles'], 'roles' => 'poster'], function () {
    Route::get('company/create', 'CompanyController@createCompany');
    Route::post('company/store', 'CompanyController@storeCompany');
    Route::get('job/create', 'JobController@createJob');
    Route::post('job/store', 'JobController@storeJob');
    Route::post('/curriculumvitae/send-comment', 'CurriculumVitaeController@sendcomment');
});

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
    Route::resource('admin/salary', 'SalaryController');
});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => 'master'], function () {
    Route::post('city/active', 'CityController@active');
    Route::post('city/unactive', 'CityController@unactive');
    Route::get('city/admin', 'CityController@admin');

    Route::post('district/active', 'DistrictController@active');
    Route::post('district/unactive', 'DistrictController@unactive');
    Route::get('district/admin', 'DistrictController@admin');

    Route::get('apply/admin', 'ApplyController@admin');
});
Route::resource('apply', 'Apply\\ApplyController');