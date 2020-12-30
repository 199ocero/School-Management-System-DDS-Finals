<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\College;
use App\Traits\ApiResponser;
use App\Http\Controllers\Response;


Class CollegeController extends Controller {
    use ApiResponser;
    private $request;

    public function __construct(Request $request){

        $this->request = $request;
    }

    public function getCollege(){
        $college =  College::all();
        return $this->successResponse($college);
    }

    public function createCollege(Request $request)
    {
        $rules = [
            'id' => 'required|min:1|max:255',
            'name' => 'required|min:1|max:200',
            'code' => 'required|min:1|max:200',
            'date' => 'required|min:1|max:200',
        ];

        $this->validate($request, $rules);

        $college = College::create($request->all());

        return $this->createSuccess($college);
    }


    public function findCollege($id)
    {
        $college = College::findOrFail($id);
        return $this->successResponse($college);
    }

    public function updateCollege(Request $request, $id)
    {
        $rules = [
            'id' => 'required|max:255',
            'name' => 'required|max:200',
            'code' => 'required|max:200',
            'date' => 'required|max:200',
        ];

        $this->validate($request, $rules);

        $college = College::findOrFail($id);

        $college->fill($request->all());

        // if no changes happen
        if ($college->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $college->save();
        
        return $this->updateSuccess($college);
    }

    public function deleteCollege($id) {
        $college = College::findOrFail($id);
        $college->delete();
        return $this->deleteSuccess($college);
    }
}

?>