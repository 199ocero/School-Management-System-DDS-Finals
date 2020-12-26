<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Section;
use App\Traits\ApiResponser;
use App\Http\Controllers\Response;


Class SectionController extends Controller {
    use ApiResponser;
    private $request;

    public function __construct(Request $request){

        $this->request = $request;
    }

    public function getSection(){
        $section =  Section::all();
        return $this->successResponse($section);
    }

    public function createSection(Request $request)
    {
        $rules = [
            'id' => 'required|min:1|max:255',
            'name' => 'required|min:1|max:200',
            'date' => 'required|min:1|max:200',
        ];

        $this->validate($request, $rules);

        $section = Section::create($request->all());

        return $this->createSuccess($section);
    }


    public function findSection($id)
    {
        $section = Section::findOrFail($id);
        return $this->successResponse($section);
    }

    public function updateSection(Request $request, $id)
    {
        $rules = [
            'id' => 'required|max:255',
            'name' => 'required|max:200',
            'date' => 'required|max:200',
        ];

        $this->validate($request, $rules);

        $section = Section::findOrFail($id);

        $section->fill($request->all());

        // if no changes happen
        if ($section->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $section->save();
        
        return $this->updateSuccess($section);
    }

    public function deleteSection($id) {
        $section = Section::findOrFail($id);
        $section->delete();
        return $this->deleteSuccess($section);
    }
}

?>