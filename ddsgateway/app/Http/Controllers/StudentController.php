<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\StudentService;


Class StudentController extends Controller {
    use ApiResponser;
 
    public $courseservice;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(StudentService $courseservice)
    {
        $this->courseservice = $courseservice;
    }

    public function getStudent()
    {
        return $this->successResponse($this->courseservice->getStudent()); 
    }

    public function createStudent(Request $request)
    {   

        return $this->successResponse($this->courseservice->createStudent($request->all()));
    }

    public function findStudent($id){
        return $this->successResponse($this->courseservice->findStudent($id));
    }

    public function updateStudent(Request $request, $id)
    {
        return $this->successResponse($this->courseservice->updateStudent($request->all(),$id));
    }

    public function deleteStudent($id)
    {
        return $this->successResponse($this->courseservice->deleteStudent($id));
    }

}

?>