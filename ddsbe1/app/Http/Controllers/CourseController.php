<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Course;
use App\Traits\ApiResponser;
use App\Http\Controllers\Response;


Class CourseController extends Controller {
    use ApiResponser;
    private $request;
    
    public function __construct(Request $request){

        $this->request = $request;
    }

    public function getCourse(){
        $course =  Course::all();
        return $this->successResponse($course);
    }

    public function createCourse(Request $request)
    {
        $rules = [
            'id' => 'required|min:1|max:255',
            'name' => 'required|min:1|max:200',
            'code' => 'required|min:1|max:200',
            'college' => 'required|min:1|max:200',
            'date' => 'required|min:1|max:200',
        ];

        $this->validate($request, $rules);

        $course = Course::create($request->all());

        return $this->createSuccess($course);
    }


    public function findCourse($id)
    {
        $course = Course::findOrFail($id);
        return $this->successResponse($course);
    }

    public function updateCourse(Request $request, $id)
    {
        $rules = [
            'id' => 'required|min:1|max:255',
            'name' => 'required|min:1|max:200',
            'code' => 'required|min:1|max:200',
            'college' => 'required|min:1|max:200',
            'date' => 'required|min:1|max:200',
        ];

        $this->validate($request, $rules);

        $course = Course::findOrFail($id);

        $course->fill($request->all());

        // if no changes happen
        if ($course->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $course->save();
        
        return $this->updateSuccess($course);
    }

    public function deleteCourse($id) {
        $course = Course::findOrFail($id);
        $course->delete();
        return $this->deleteSuccess($course);
    }
}

?>