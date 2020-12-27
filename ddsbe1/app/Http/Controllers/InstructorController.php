<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Instructor;
use App\Traits\ApiResponser;
use App\Http\Controllers\Response;


Class InstructorController extends Controller {
    use ApiResponser;
    private $request;

    public function __construct(Request $request){

        $this->request = $request;
    }

    public function getInstructor(){
        $instructor =  Instructor::all();
        return $this->successResponse($instructor);
    }

    public function createInstructor(Request $request)
    {
        $rules = [
            'id' => 'required|min:1|max:255',
            'fname' => 'required|min:1|max:200',
            'mname' => 'required|min:1|max:200',
            'lname' => 'required|min:1|max:200',
            'age'=>'required|min:1|max:200',
            'birth_of_date'=>'required|min:1|max:200',
            'address'=>'required|min:1|max:300',
        ];

        $this->validate($request, $rules);

        $instructor = Instructor::create($request->all());

        return $this->createSuccess($instructor);
    }


    public function findInstructor($id)
    {
        $instructor = Instructor::findOrFail($id);
        return $this->successResponse($instructor);
    }

    public function updateInstructor(Request $request, $id)
    {
        $rules = [
            'id' => 'required|min:1|max:255',
            'fname' => 'required|min:1|max:200',
            'mname' => 'required|min:1|max:200',
            'lname' => 'required|min:1|max:200',
            'age'=>'required|min:1|max:200',
            'birth_of_date'=>'required|min:1|max:200',
            'address'=>'required|min:1|max:300',
        ];

        $this->validate($request, $rules);

        $instructor = Instructor::findOrFail($id);

        $instructor->fill($request->all());

        // if no changes happen
        if ($instructor->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $instructor->save();
        
        return $this->updateSuccess($instructor);
    }

    public function deleteInstructor($id) {
        $instructor = Instructor::findOrFail($id);
        $instructor->delete();
        return $this->deleteSuccess($instructor);
    }
}

?>