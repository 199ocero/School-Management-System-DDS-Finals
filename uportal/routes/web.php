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
    
    Route::get('/dashboard', 'Dashboard\DashboardController@getDashboard');

    Route::get('/security', function () {
        return view('security.security');
    });

    //admin routes
    Route::get('/admin', 'Admin\AdminController@registeredAdmin');
    Route::post('/admin-create', 'Admin\AdminController@createAdmin');
    Route::get('/admin-edit/{id}', 'Admin\AdminController@editAdmin');
    Route::put('/admin-update/{id}', 'Admin\AdminController@updateAdmin');
    Route::delete('/admin-delete/{id}', 'Admin\AdminController@deleteAdmin');

    //college routes
    Route::get('/college', 'College\CollegeController@registeredCollege');
    Route::post('/college-create', 'College\CollegeController@createCollege');
    Route::get('/college-edit/{id}', 'College\CollegeController@editCollege');
    Route::put('/college-update/{id}', 'College\CollegeController@updateCollege');
    Route::delete('/college-delete/{id}', 'College\CollegeController@deleteCollege');

    //course routes
    Route::get('/course', 'Course\CourseController@registeredCourse');
    Route::post('/course-create', 'Course\CourseController@createCourse');
    Route::get('/course-edit/{id}', 'Course\CourseController@editCourse');
    Route::put('/course-update/{id}', 'Course\CourseController@updateCourse');
    Route::delete('/course-delete/{id}', 'Course\CourseController@deleteCourse');

    //subject routes
    Route::get('/subject', 'Subject\SubjectController@registeredSubject');
    Route::post('/subject-create', 'Subject\SubjectController@createSubject');
    Route::get('/subject-edit/{id}', 'Subject\SubjectController@editSubject');
    Route::put('/subject-update/{id}', 'Subject\SubjectController@updateSubject');
    Route::delete('/subject-delete/{id}', 'Subject\SubjectController@deleteSubject');

    //section routes
    Route::get('/section', 'Section\SectionController@registeredSection');
    Route::post('/section-create', 'Section\SectionController@createSection');
    Route::get('/section-edit/{id}', 'Section\SectionController@editSection');
    Route::put('/section-update/{id}', 'Section\SectionController@updateSection');
    Route::delete('/section-delete/{id}', 'Section\SectionController@deleteSection');

    //student routes
    Route::get('/student', 'Student\StudentController@registeredStudent');
    Route::post('/student-create', 'Student\StudentController@createStudent');
    Route::get('/student-edit/{id}', 'Student\StudentController@editStudent');
    Route::put('/student-update/{id}', 'Student\StudentController@updateStudent');
    Route::delete('/student-delete/{id}', 'Student\StudentController@deleteStudent');

    //instructor routes
    Route::get('/instructor', 'Instructor\InstructorController@registeredInstructor');
    Route::post('/instructor-create', 'Instructor\InstructorController@createInstructor');
    Route::get('/instructor-edit/{id}', 'Instructor\InstructorController@editInstructor');
    Route::put('/instructor-update/{id}', 'Instructor\InstructorController@updateInstructor');
    Route::delete('/instructor-delete/{id}', 'Instructor\InstructorController@deleteInstructor');

    //student-role routes
    Route::get('/student-role', 'Role\StudentRoleController@registeredStudentRole');
    Route::post('/studentrole-create', 'Role\StudentRoleController@createStudentRole');
    Route::get('/studentrole-edit/{id}', 'Role\StudentRoleController@editStudentRole');
    Route::put('/studentrole-update/{id}', 'Role\StudentRoleController@updateStudentRole');
    Route::delete('/studentrole-delete/{id}', 'Role\StudentRoleController@deleteStudentRole');;
});

