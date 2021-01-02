<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Student;
use App\Traits\ApiResponser;
use App\Http\Controllers\Response;


Class StudentController extends Controller {
    use ApiResponser;
    private $request;

    public function __construct(Request $request){

        $this->request = $request;
    }

    public function getStudent(){
        $student =  Student::all();
        return $this->successResponse($student);
    }

    public function createStudent(Request $request)
    {
        $rules = [
            'id' => 'min:1|max:255',
            'fname' => 'min:1|max:200',
            'mname' => 'min:1|max:200',
            'lname' => 'min:1|max:200',
            'age'=>'min:1|max:200',
            'birth_of_date'=>'min:1|max:200',
            'address'=>'max:300',
            'role'=>'min:0|max:300',
        ];

        $this->validate($request, $rules);

        $student = Student::create($request->all());

        return $this->createSuccess($student);
    }


    public function findStudent($id)
    {
        $student = Student::findOrFail($id);
        return $this->successResponse($student);
    }

    public function updateStudent(Request $request, $id)
    {
        $rules = [
            'id' => 'min:1|max:255',
            'fname' => 'min:1|max:200',
            'mname' => 'min:1|max:200',
            'lname' => 'min:1|max:200',
            'age'=>'min:1|max:200',
            'birth_of_date'=>'min:1|max:200',
            'address'=>'max:300',
            'role'=>'min:0|max:300',
        ];

        $this->validate($request, $rules);

        $student = Student::findOrFail($id);

        $student->fill($request->all());

        // if no changes happen
        if ($student->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $student->save();
        
        return $this->updateSuccess($student);
    }

    public function deleteStudent($id) {
        $student = Student::findOrFail($id);
        $student->delete();
        return $this->deleteSuccess($student);
    }
}

?>