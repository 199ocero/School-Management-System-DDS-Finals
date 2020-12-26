<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\SectionService;


Class SectionController extends Controller {
    use ApiResponser;
 
    public $sectionservice;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(SectionService $sectionservice)
    {
        $this->sectionservice = $sectionservice;
    }

    public function getSection()
    {
        return $this->successResponse($this->sectionservice->getSection()); 
    }

    public function createSection(Request $request)
    {   

        return $this->successResponse($this->sectionservice->createSection($request->all()));
    }

    public function findSection($id){
        return $this->successResponse($this->sectionservice->findSection($id));
    }

    public function updateSection(Request $request, $id)
    {
        return $this->successResponse($this->sectionservice->updateSection($request->all(),$id));
    }

    public function deleteSection($id)
    {
        return $this->successResponse($this->sectionservice->deleteSection($id));
    }

}

?>