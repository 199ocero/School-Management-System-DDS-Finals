<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Auth;

class StudentRoleController extends Controller
{
    public function registeredStudentRole(){

        
        $token = Auth::user()->security_token;

        $response = Http::withToken($token)->get("http://localhost:8003/studentrole1");
        $studentrole = json_decode($response,true);

        $response1 = Http::withToken($token)->get("http://localhost:8003/student1");
        $student = json_decode($response1,true);

        $response2 = Http::withToken($token)->get("http://localhost:8003/course1");
        $course = json_decode($response2,true);

        $response3 = Http::withToken($token)->get("http://localhost:8003/section1");
        $section = json_decode($response3,true);

        return view('role.student-role')->with('studentrole',$studentrole)->with('student',$student)->with('course',$course)->with('section',$section);
    }

    public function createStudentRole(Request $request){

        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->get("http://localhost:8003/college1");
        $college = json_decode($response,true);

        $response1 = Http::withToken($token)->get("http://localhost:8003/course1");
        $course1 = json_decode($response1,true);

        $course = $request->input('course');

        $collegecode=null;
        for($i=0;$i<count($course1);$i++){
            if($course==$course1[$i]['name']){
                for($j=0;$j<count($college);$j++){
                    if($course1[$i]['college']==$college[$j]['name']){
                        $collegecode = $college[$j]['code'];
                    }
                }
            }
        }

        $year = date('Y');
        $day = date('d');
        $month = date('m');
        $name= $request->input('name');
        $id= uniqid("$year$month$day-");
        $code= $request->input('code');
        $year = $request->input('year');
        $semester = $request->input('semester');
        
        $date = date("F j, Y");

        $response3 = Http::withToken($token)->post("http://localhost:8003/studentrole1", [
            'id' => $id,
            'name'=> $name,
            'code'=>$code,
            'year'=>$year,
            'semester'=>$semester,
            'course'=>$course,
            'college'=>$collegecode,
            'date' => $date,
        ]);
        
        Session::flash('statuscode','success');
        return redirect('/studentrole')->with('status','StudentRole Created Successfully.');
    }

    public function editStudentRole($id){
        $token = Auth::user()->security_token;
        $studentrole = Http::withToken($token)->get("http://localhost:8003/studentrole1/".$id);

        $response1 = Http::withToken($token)->get("http://localhost:8003/course1");
        $course = json_decode($response1,true);

        return view('studentrole.studentrole-edit')->with('studentrole',$studentrole)->with('course',$course);
    }
    public function updateStudentRole(Request $request,$id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->get("http://localhost:8003/college1");
        $college = json_decode($response,true);

        $response1 = Http::withToken($token)->get("http://localhost:8003/course1");
        $course1 = json_decode($response1,true);

        $course = $request->input('course');

        $collegecode=null;
        for($i=0;$i<count($course1);$i++){
            if($course==$course1[$i]['name']){
                for($j=0;$j<count($college);$j++){
                    if($course1[$i]['college']==$college[$j]['name']){
                        $collegecode = $college[$j]['code'];
                    }
                }
            }
        }

        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->put("http://localhost:8003/studentrole1/".$id,[
            'id' =>$request->input('id'),
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'year' => $request->input('year'),
            'semester' => $request->input('semester'),
            'course' => $request->input('course'),
            'college' => $collegecode,
            'date' =>$request->input('date')
        ]);

        Session::flash('statuscode','success');
        return redirect('/studentrole')->with('status','StudentRole Updated Successfully.');
    }
    public function deleteStudentRole($id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->delete("http://localhost:8003/studentrole1/".$id);
        
        return response()->json(['status'=>'Poof! StudentRole is deleted.']);
    }

    
}
