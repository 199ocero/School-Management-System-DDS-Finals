<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\CollegeService;


Class CollegeController extends Controller {
    use ApiResponser;
 
    public $collegeservice;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(CollegeService $collegeservice)
    {
        $this->collegeservice = $collegeservice;
    }

    public function getCollege()
    {
        return $this->successResponse($this->collegeservice->getCollege()); 
    }

    public function createCollege(Request $request)
    {   

        return $this->successResponse($this->collegeservice->createCollege($request->all()));
    }

    public function findCollege($id){
        return $this->successResponse($this->collegeservice->findCollege($id));
    }

    public function updateCollege(Request $request, $id)
    {
        return $this->successResponse($this->collegeservice->updateCollege($request->all(),$id));
    }

    public function deleteCollege($id)
    {
        return $this->successResponse($this->collegeservice->deleteCollege($id));
    }

}

?>