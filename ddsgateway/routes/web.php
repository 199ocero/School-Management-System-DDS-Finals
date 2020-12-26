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
    $router->get('/department1', 'DepartmentController@getDepartment');//show all department from site 1
    $router->post('/department1', 'DepartmentController@createDepartment'); //create department from site 1
    $router->get('/department1/{id}', 'DepartmentController@findDepartment'); //find department with specific ID from site 1
    $router->put('/department1/{id}', 'DepartmentController@updateDepartment'); //update department with specific ID from site 1
    $router->delete('/department1/{id}', 'DepartmentController@deleteDepartment'); //delete department with specific ID from site 1

    //course site 1
    $router->get('/course1', 'CourseController@getCourse');//show all course from site 1
    $router->post('/course1', 'CourseController@createCourse'); //create course from site 1
    $router->get('/course1/{id}', 'CourseController@findCourse'); //find course with specific ID from site 1
    $router->put('/course1/{id}', 'CourseController@updateCourse'); //update course with specific ID from site 1
    $router->delete('/course1/{id}', 'CourseController@deleteCourse'); //delete course with specific ID from site 1

    //subject site 1
    $router->get('/subject1', 'SubjectController@getSubject');//show all subject from site 1
    $router->post('/subject1', 'SubjectController@createSubject'); //create subject from site 1
    $router->get('/subject1/{id}', 'SubjectController@findSubject'); //find subject with specific ID from site 1
    $router->put('/subject1/{id}', 'SubjectController@updateSubject'); //update subject with specific ID from site 1
    $router->delete('/subject1/{id}', 'SubjectController@deleteSubject'); //delete subject with specific ID from site 1

    //section site 1
    $router->get('/section1', 'SectionController@getSection');//show all subject from site 1
    $router->post('/section1', 'SectionController@createSection'); //create subject from site 1
    $router->get('/section1/{id}', 'SectionController@findSection'); //find subject with specific ID from site 1
    $router->put('/section1/{id}', 'SectionController@updateSection'); //update subject with specific ID from site 1
    $router->delete('/section1/{id}', 'SectionController@deleteSection'); //delete subject with specific ID from site 1

});

