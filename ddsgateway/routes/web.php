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




$router->group(['middleware' => 'client.credentials'],function() use ($router){
    
    //routes for site 
    $router->get('/users1', 'User1Controller@getUsers');//show all users from site 1
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

    //deparment site 1
    $router->get('/department1', 'DepartmentController@getDepartment');//show all users from site 1
    $router->post('/department1', 'DepartmentController@createDepartment'); //create users from site 1
    $router->get('/department1/{id}', 'DepartmentController@findDepartment'); //find users with specific ID from site 1
    $router->put('/department1/{id}', 'DepartmentController@updateDepartment'); //update users with specific ID from site 1
    $router->delete('/department1/{id}', 'DepartmentController@deleteDepartment'); //delete users with specific ID from site 1
});

