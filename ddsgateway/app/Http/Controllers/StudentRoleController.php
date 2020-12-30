<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\StudentRoleService;


Class StudentRoleController extends Controller {
    use ApiResponser;
 
    public $studentroleservice;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(StudentRoleService $studentroleservice)
    {
        $this->studentroleservice = $studentroleservice;
    }

    public function getStudentRole()
    {
        return $this->successResponse($this->studentroleservice->getStudentRole()); 
    }

    public function createStudentRole(Request $request)
    {   

        return $this->successResponse($this->studentroleservice->createStudentRole($request->all()));
    }

    public function findStudentRole($id){
        return $this->successResponse($this->studentroleservice->findStudentRole($id));
    }

    public function updateStudentRole(Request $request, $id)
    {
        return $this->successResponse($this->studentroleservice->updateStudentRole($request->all(),$id));
    }

    public function deleteStudentRole($id)
    {
        return $this->successResponse($this->studentroleservice->deleteStudentRole($id));
    }

}

?>