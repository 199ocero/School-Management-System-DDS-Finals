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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth','admin']],function (){
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    });

    Route::get('/security', function () {
        return view('security.security');
    });

    //admin routes
    Route::get('/admin', 'Admin\AdminController@registeredAdmin');
    Route::post('/admin-create', 'Admin\AdminController@createAdmin');
    Route::get('/admin-edit/{id}', 'Admin\AdminController@editAdmin');
    Route::put('/admin-update/{id}', 'Admin\AdminController@updateAdmin');
    Route::delete('/admin-delete/{id}', 'Admin\AdminController@deleteAdmin');

    //department routes
    Route::get('/department', 'Department\DepartmentController@registeredDeparment');
    Route::post('/department-create', 'Department\DepartmentController@createDeparment');
    Route::get('/department-edit/{id}', 'Department\DepartmentController@editDeparment');
    Route::put('/department-update/{id}', 'Department\DepartmentController@updateDeparment');
    Route::delete('/department-delete/{id}', 'Department\DepartmentController@deleteDeparment');


});

