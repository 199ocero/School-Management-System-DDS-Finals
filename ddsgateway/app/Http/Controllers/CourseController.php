<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\CourseService;


Class CourseController extends Controller {
    use ApiResponser;
 
    public $courseservice;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(CourseService $courseservice)
    {
        $this->courseservice = $courseservice;
    }

    public function getCourse()
    {
        return $this->successResponse($this->courseservice->getCourse()); 
    }

    public function createCourse(Request $request)
    {   

        return $this->successResponse($this->courseservice->createCourse($request->all()));
    }

    public function findCourse($id){
        return $this->successResponse($this->courseservice->findCourse($id));
    }

    public function updateCourse(Request $request, $id)
    {
        return $this->successResponse($this->courseservice->updateCourse($request->all(),$id));
    }

    public function deleteCourse($id)
    {
        return $this->successResponse($this->courseservice->deleteCourse($id));
    }

}

?>