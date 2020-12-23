<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//login
$router->get('/', function () use ($router) {
    return view('login');
});


//dashboard
$router->get('/dashboard', function () use ($router) {
    return view('dashboard.dashboard');
});

//admin
$router->get('/admin', 'Admin\DashboardController@registeredAdmin');
$router->post('/admin-create', 'Admin\DashboardController@createAdmin');
$router->get('/admin-edit/{id}', 'Admin\DashboardController@editAdmin');
$router->put('/admin-update/{id}', 'Admin\DashboardController@updateAdmin');
$router->delete('/admin-delete/{id}', 'Admin\DashboardController@deleteAdmin');

//dashboard
$router->get('/department', 'Department\DepartmentController@registeredAdmin');


$router->group(['middleware' => 'client.credentials'],function() use ($router){
    
    //routes for site 1
     //show all users from site 1
    $router->get('/users1', 'User1Controller@getUsers');
    $router->post('/users1', 'User1Controller@createUser'); //create users from site 1
    $router->get('/users1/{id}', 'User1Controller@findUser'); //find users with specific ID from site 1
    $router->put('/users1/{id}', 'User1Controller@updateUser'); //update users with specific ID from site 1
    $router->delete('/users1/{id}', 'User1Controller@deleteUser'); //delete users with specific ID from site 1


    //routes for site 2
    $router->get('/users2', 'User2Controller@getUsers'); //show all users from site 1
    $router->post('/users2', 'User2Controller@createUser'); //create users from site 1
    $router->get('/users2/{id}', 'User2Controller@findUser'); //find users with specific ID from site 1
    $router->put('/users2/{id}', 'User2Controller@updateUser'); //update users with specific ID from site 1
    $router->delete('/users2/{id}', 'User2Controller@deleteUser'); //delete users with specific ID from site 1
});

// //site1
// $router->get('/users1', 'User1Controller@getUsers');

$router->get('/show', 'Admin\DashboardController@showRes');
