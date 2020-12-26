<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\SubjectService;


Class SubjectController extends Controller {
    use ApiResponser;
 
    public $subjectservice;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(SubjectService $subjectservice)
    {
        $this->subjectservice = $subjectservice;
    }

    public function getSubject()
    {
        return $this->successResponse($this->subjectservice->getSubject()); 
    }

    public function createSubject(Request $request)
    {   

        return $this->successResponse($this->subjectservice->createSubject($request->all()));
    }

    public function findSubject($id){
        return $this->successResponse($this->subjectservice->findSubject($id));
    }

    public function updateSubject(Request $request, $id)
    {
        return $this->successResponse($this->subjectservice->updateSubject($request->all(),$id));
    }

    public function deleteSubject($id)
    {
        return $this->successResponse($this->subjectservice->deleteSubject($id));
    }

}

?>