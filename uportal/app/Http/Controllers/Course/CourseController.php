<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Auth;

class CourseController extends Controller
{
    public function registeredCourse(){

        
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->get("http://localhost:8003/course1");
        $course = json_decode($response,true);

        $response1 = Http::withToken($token)->get("http://localhost:8003/college1");
        $college = json_decode($response1,true);
        
        return view('course.course')->with('course',$course)->with('college',$college);
    }

    public function createCourse(Request $request){

        $year = date('Y');
        $day = date('d');
        $month = date('m');

        $id= uniqid("$year$month$day-");
        $name= $request->input('name');
        $code= $request->input('code');
        $college= $request->input('college');
        $date = date("F j, Y");

        
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->post("http://localhost:8003/course1", [
            'id' => $id,
            'name'=> $name,
            'code'=>$code,
            'college'=>$college,
            'date' => $date,
        ]);
        
        Session::flash('statuscode','success');
        return redirect('/course')->with('status','Course Created Successfully.');

    }

    public function editCourse($id){
        $token = Auth::user()->security_token;
        $course = Http::withToken($token)->get("http://localhost:8003/course1/".$id);

        $response1 = Http::withToken($token)->get("http://localhost:8003/college1");
        $college = json_decode($response1,true);

        return view('course.course-edit')->with('course',$course)->with('college',$college);
    }
    public function updateCourse(Request $request,$id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->put("http://localhost:8003/course1/".$id,[
            'id' =>$request->input('id'),
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'college' => $request->input('college'),
            'date' =>$request->input('date')
        ]);

        Session::flash('statuscode','success');
        return redirect('/course')->with('status','Course Updated Successfully.');
    }
    public function deleteCourse($id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->delete("http://localhost:8003/course1/".$id);
        
        return response()->json(['status'=>'Poof! Course is deleted.']);
    }
}
