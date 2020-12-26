<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Subject;
use App\Traits\ApiResponser;
use App\Http\Controllers\Response;


Class SubjectController extends Controller {
    use ApiResponser;
    private $request;
    
    public function __construct(Request $request){

        $this->request = $request;
    }

    public function getSubject(){
        $subject =  Subject::all();
        return $this->successResponse($subject);
    }

    public function createSubject(Request $request)
    {
        $rules = [
            'id' => 'required|min:1|max:255',
            'name' => 'required|min:1|max:200',
            'code' => 'required|min:1|max:200',
            'date' => 'required|min:1|max:200',
        ];

        $this->validate($request, $rules);

        $subject = Subject::create($request->all());

        return $this->createSuccess($subject);
    }


    public function findSubject($id)
    {
        $subject = Subject::findOrFail($id);
        return $this->successResponse($subject);
    }

    public function updateSubject(Request $request, $id)
    {
        $rules = [
            'id' => 'required|min:1|max:255',
            'name' => 'required|min:1|max:200',
            'code' => 'required|min:1|max:200',
            'date' => 'required|min:1|max:200',
        ];

        $this->validate($request, $rules);

        $subject = Subject::findOrFail($id);

        $subject->fill($request->all());

        // if no changes happen
        if ($subject->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $subject->save();
        
        return $this->updateSuccess($subject);
    }

    public function deleteSubject($id) {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return $this->deleteSuccess($subject);
    }
}

?>