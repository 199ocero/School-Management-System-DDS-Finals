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
    $router->get('/college1', 'CollegeController@getCollege');//show all college from site 1
    $router->post('/college1', 'CollegeController@createCollege'); //create college from site 1
    $router->get('/college1/{id}', 'CollegeController@findCollege'); //find college with specific ID from site 1
    $router->put('/college1/{id}', 'CollegeController@updateCollege'); //update college with specific ID from site 1
    $router->delete('/college1/{id}', 'CollegeController@deleteCollege'); //delete college with specific ID from site 1

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
    $router->get('/section1', 'SectionController@getSection');//show all section from site 1
    $router->post('/section1', 'SectionController@createSection'); //create section from site 1
    $router->get('/section1/{id}', 'SectionController@findSection'); //find section with specific ID from site 1
    $router->put('/section1/{id}', 'SectionController@updateSection'); //update section with specific ID from site 1
    $router->delete('/section1/{id}', 'SectionController@deleteSection'); //delete section with specific ID from site 1

    //student site 1
    $router->get('/student1', 'StudentController@getStudent');//show all student from site 1
    $router->post('/student1', 'StudentController@createStudent'); //create student from site 1
    $router->get('/student1/{id}', 'StudentController@findStudent'); //find student with specific ID from site 1
    $router->put('/student1/{id}', 'StudentController@updateStudent'); //update student with specific ID from site 1
    $router->delete('/student1/{id}', 'StudentController@deleteStudent'); //delete student with specific ID from site 1

    //instructor site 1
    $router->get('/instructor1', 'InstructorController@getInstructor');//show all instructor from site 1
    $router->post('/instructor1', 'InstructorController@createInstructor'); //create instructor from site 1
    $router->get('/instructor1/{id}', 'InstructorController@findInstructor'); //find instructor with specific ID from site 1
    $router->put('/instructor1/{id}', 'InstructorController@updateInstructor'); //update instructor with specific ID from site 1
    $router->delete('/instructor1/{id}', 'InstructorController@deleteInstructor'); //delete instructor with specific ID from site 1

    //studentrole site 1
    $router->get('/studentrole1', 'StudentRoleController@getStudentRole');//show all instructor from site 1
    $router->post('/studentrole1', 'StudentRoleController@createStudentRole'); //create instructor from site 1
    $router->get('/studentrole1/{id}', 'StudentRoleController@findStudentRole'); //find instructor with specific ID from site 1
    $router->put('/studentrole1/{id}', 'StudentRoleController@updateStudentRole'); //update instructor with specific ID from site 1
    $router->delete('/studentrole1/{id}', 'StudentRoleController@deleteStudentRole'); //delete instructor with specific ID from site 1

});

