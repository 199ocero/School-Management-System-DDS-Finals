<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Auth;

class StudentController extends Controller
{

    public function registeredStudent(){

        
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->get("http://localhost:8003/student1");
        $student = json_decode($response,true);
        
        return view('student.student')->with('student',$student);
    }

    public function createStudent(Request $request){

        $year = date('Y');
        $day = date('d');
        $month = date('m');

        $id= uniqid("$year$month$day-");
        $name= $request->input('name');
        $date = date("F j, Y");

        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->post("http://localhost:8003/student1", [
            'id' => $id,
            'name'=> $name,
            'date' => $date,
        ]);
        
        Session::flash('statuscode','success');
        return redirect('/student')->with('status','Student Created Successfully.');
    }

    public function editStudent($id){
        $token = Auth::user()->security_token;
        $student = Http::withToken($token)->get("http://localhost:8003/student1/".$id);

        return view('student.student-edit')->with('student',$student);
    }
    public function updateStudent(Request $request,$id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->put("http://localhost:8003/student1/".$id,[
            'id' =>$request->input('id'),
            'name' => $request->input('name'),
            'date' =>$request->input('date')
        ]);

        Session::flash('statuscode','success');
        return redirect('/student')->with('status','Student Updated Successfully.');
    }
    public function deleteStudent($id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->delete("http://localhost:8003/student1/".$id);
        
        return response()->json(['status'=>'Poof! Student is deleted.']);
    }
    
}
