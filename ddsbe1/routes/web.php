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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/users','UserController@getUsers'); //get all users
$router->post('/users', 'UserController@createUser');  // create new user record
$router->get('/users/{id}', 'UserController@findUser'); // get user by id
$router->put('/users/{id}', 'UserController@updateUser'); // update user record
$router->delete('/users/{id}', 'UserController@delete'); // delete record

//roles
$router->get('/roles','RoleController@getRole'); //get all roles
$router->get('/roles/{id}', 'RoleController@findRole'); // get role by id

//department
$router->get('/department','DepartmentController@getDepartment'); //get all department
$router->post('/department', 'DepartmentController@createDepartment');  // create new department record
$router->get('/department/{id}', 'DepartmentController@findDepartment'); // get user by id
$router->put('/department/{id}', 'DepartmentController@updateDepartment'); // update department record
$router->delete('/department/{id}', 'DepartmentController@deleteDepartment'); // delete record

//course
$router->get('/course','CourseController@getCourse'); //get all course
$router->post('/course', 'CourseController@createCourse');  // create new course record
$router->get('/course/{id}', 'CourseController@findCourse'); // get course by id
$router->put('/course/{id}', 'CourseController@updateCourse'); // update course record
$router->delete('/course/{id}', 'CourseController@deleteCourse'); // delete record

//subject
$router->get('/subject','SubjectController@getSubject'); //get all subject
$router->post('/subject', 'SubjectController@createSubject');  // create new subject record
$router->get('/subject/{id}', 'SubjectController@findSubject'); // get subject by id
$router->put('/subject/{id}', 'SubjectController@updateSubject'); // update subject record
$router->delete('/subject/{id}', 'SubjectController@deleteSubject'); // delete record

//section
$router->get('/section','SectionController@getSection'); //get all subject
$router->post('/section', 'SectionController@createSection');  // create new subject record
$router->get('/section/{id}', 'SectionController@findSection'); // get subject by id
$router->put('/section/{id}', 'SectionController@updateSection'); // update subject record
$router->delete('/section/{id}', 'SectionController@deleteSection'); // delete record

//student
$router->get('/student','StudentController@getStudent'); //get all subject
$router->post('/student', 'StudentController@createStudent');  // create new subject record
$router->get('/student/{id}', 'StudentController@findStudent'); // get subject by id
$router->put('/student/{id}', 'StudentController@updateStudent'); // update subject record
$router->delete('/student/{id}', 'StudentController@deleteStudent'); // delete record

//instructor
$router->get('/instructor','InstructorController@getInstructor'); //get all subject
$router->post('/instructor', 'InstructorController@createInstructor');  // create new subject record
$router->get('/instructor/{id}', 'InstructorController@findInstructor'); // get subject by id
$router->put('/instructor/{id}', 'InstructorController@updateInstructor'); // update subject record
$router->delete('/instructor/{id}', 'InstructorController@deleteInstructor'); // delete record