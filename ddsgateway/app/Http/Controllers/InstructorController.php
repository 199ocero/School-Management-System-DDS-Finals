<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\InstructorService;


Class InstructorController extends Controller {
    use ApiResponser;
 
    public $instructorservice;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(InstructorService $instructorservice)
    {
        $this->instructorservice = $instructorservice;
    }

    public function getInstructor()
    {
        return $this->successResponse($this->instructorservice->getInstructor()); 
    }

    public function createInstructor(Request $request)
    {   

        return $this->successResponse($this->instructorservice->createInstructor($request->all()));
    }

    public function findInstructor($id){
        return $this->successResponse($this->instructorservice->findInstructor($id));
    }

    public function updateInstructor(Request $request, $id)
    {
        return $this->successResponse($this->instructorservice->updateInstructor($request->all(),$id));
    }

    public function deleteInstructor($id)
    {
        return $this->successResponse($this->instructorservice->deleteInstructor($id));
    }

}

?>