<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\StudentRole;
use App\Traits\ApiResponser;
use App\Http\Controllers\Response;


Class StudentRoleController extends Controller {
    use ApiResponser;
    private $request;
    
    public function __construct(Request $request){

        $this->request = $request;
    }

    public function getStudentRole(){
        $studentrole =  StudentRole::all();
        return $this->successResponse($studentrole);
    }

    public function createStudentRole(Request $request)
    {
        $rules = [
            'id' => 'required|min:1|max:255',
            'student_id' => 'required|min:1|max:200',
            'subject_id' => 'required|min:1|max:200',
            'section' => 'required|min:1|max:200',
            'date' => 'required|min:1|max:200',
        ];

        $this->validate($request, $rules);

        $studentrole = StudentRole::create($request->all());

        return $this->createSuccess($studentrole);
    }


    public function findStudentRole($id)
    {
        $studentrole = StudentRole::findOrFail($id);
        return $this->successResponse($studentrole);
    }

    public function updateStudentRole(Request $request, $id)
    {
        $rules = [
            'id' => 'required|min:1|max:255',
            'student_id' => 'required|min:1|max:200',
            'subject_id' => 'required|min:1|max:200',
            'section' => 'required|min:1|max:200',
            'date' => 'required|min:1|max:200',
        ];

        $this->validate($request, $rules);

        $studentrole = StudentRole::findOrFail($id);

        $studentrole->fill($request->all());

        // if no changes happen
        if ($studentrole->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $studentrole->save();
        
        return $this->updateSuccess($studentrole);
    }

    public function deleteStudentRole($id) {
        $studentrole = StudentRole::findOrFail($id);
        $studentrole->delete();
        return $this->deleteSuccess($studentrole);
    }
}

?>