<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\DepartmentService;


Class DepartmentController extends Controller {
    use ApiResponser;
 
    public $departmentservice;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(DepartmentService $departmentservice)
    {
        $this->departmentservice = $departmentservice;
    }

    public function getDepartment()
    {
        return $this->successResponse($this->departmentservice->getDepartment()); 
    }

    public function createDepartment(Request $request)
    {   

        return $this->successResponse($this->departmentservice->createDepartment($request->all()));
    }

    public function findDepartment($id){
        return $this->successResponse($this->departmentservice->findDepartment($id));
    }

    public function updateDepartment(Request $request, $id)
    {
        return $this->successResponse($this->departmentservice->updateDepartment($request->all(),$id));
    }

    public function deleteDepartment($id)
    {
        return $this->successResponse($this->departmentservice->deleteDepartment($id));
    }

}

?>