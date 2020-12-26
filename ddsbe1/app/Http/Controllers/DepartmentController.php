<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Department;
use App\Traits\ApiResponser;
use App\Http\Controllers\Response;


Class DepartmentController extends Controller {
    use ApiResponser;
    private $request;

    public function __construct(Request $request){

        $this->request = $request;
    }

    public function getDepartment(){
        $department =  Department::all();
        return $this->successResponse($department);
    }

    public function createDepartment(Request $request)
    {
        $rules = [
            'id' => 'required|min:1|max:255',
            'name' => 'required|min:1|max:200',
            'date' => 'required|min:1|max:200',
        ];

        $this->validate($request, $rules);

        $department = Department::create($request->all());

        return $this->createSuccess($department);
    }


    public function findDepartment($id)
    {
        $department = Department::findOrFail($id);
        return $this->successResponse($department);
    }

    public function updateDepartment(Request $request, $id)
    {
        $rules = [
            'id' => 'required|max:255',
            'name' => 'required|max:200',
            'date' => 'required|max:200',
        ];

        $this->validate($request, $rules);

        $department = Department::findOrFail($id);

        $department->fill($request->all());

        // if no changes happen
        if ($department->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $department->save();
        
        return $this->updateSuccess($department);
    }

    public function deleteDepartment($id) {
        $department = Department::findOrFail($id);
        $department->delete();
        return $this->deleteSuccess($department);
    }
}

?>