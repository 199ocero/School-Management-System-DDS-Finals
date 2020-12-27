<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\InstructorService;


Class InstructorController extends Controller {
    use ApiResponser;
 
    public $courseservice;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(InstructorService $courseservice)
    {
        $this->courseservice = $courseservice;
    }

    public function getInstructor()
    {
        return $this->successResponse($this->courseservice->getInstructor()); 
    }

    public function createInstructor(Request $request)
    {   

        return $this->successResponse($this->courseservice->createInstructor($request->all()));
    }

    public function findInstructor($id){
        return $this->successResponse($this->courseservice->findInstructor($id));
    }

    public function updateInstructor(Request $request, $id)
    {
        return $this->successResponse($this->courseservice->updateInstructor($request->all(),$id));
    }

    public function deleteInstructor($id)
    {
        return $this->successResponse($this->courseservice->deleteInstructor($id));
    }

}

?>