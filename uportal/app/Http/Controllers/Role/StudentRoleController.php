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

        $year = date('Y');
        $day = date('d');
        $month = date('m');
        $id= uniqid("$year$month$day-");
        $student_id= $request->input('student_id');
        $section_id= $request->input('section_id');
        $course_id= $request->input('course_id');
        $year= $request->input('year');
        $semester= $request->input('semester');
        $date = date("F j, Y");


        $response = Http::withToken($token)->get("http://localhost:8003/subject1");
        $subject = json_decode($response,true);

        for ($i=0; $i < count($subject); $i++) { 
            if($course_id==$subject[$i]['course'] and $year== $subject[$i]['year'] and $semester==$subject[$i]['semester']){
                $response1 = Http::withToken($token)->post("http://localhost:8003/studentrole1", [
                    'id' => $id,
                    'student_id' => $student_id,
                    'subject_id' => $subject[$i]['id'],
                    'section' => $section_id,
                    'date' => $date,
                ]);
            }
        }
        $response2 = Http::withToken($token)->put("http://localhost:8003/student1/".$student_id, [
            'role'=> $id
        ]);
        Session::flash('statuscode','success');
        return redirect('/student-role')->with('status','StudentRole Created Successfully.');
    }

    public function editStudentRole($id){
        $token = Auth::user()->security_token;
        $studentrole = Http::withToken($token)->get("http://localhost:8003/studentrole1/".$id);

        $response1 = Http::withToken($token)->get("http://localhost:8003/course1");
        $course = json_decode($response1,true);

        $response2 = Http::withToken($token)->get("http://localhost:8003/student1");
        $student = json_decode($response2,true);

        $response3 = Http::withToken($token)->get("http://localhost:8003/subject1");
        $subject = json_decode($response3,true);

        $response4 = Http::withToken($token)->get("http://localhost:8003/section1");
        $section = json_decode($response4,true);

        return view('role.student-edit-role')->with('studentrole',$studentrole)->with('course',$course)->with('student',$student)->with('subject',$subject)->with('section',$section);
    }
    public function updateStudentRole(Request $request,$id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->delete("http://localhost:8003/studentrole1/".$id);


        $year = date('Y');
        $day = date('d');
        $month = date('m');
        $id= uniqid("$year$month$day-");
        $student_id= $request->input('student_id');
        $student_id_orig= $request->input('student_id_orig');
        $section_id= $request->input('section_id');
        $course_id= $request->input('course_id');
        $year= $request->input('year');
        $semester= $request->input('semester');
        $date = date("F j, Y");
        
        $response = Http::withToken($token)->get("http://localhost:8003/subject1");
        $subject = json_decode($response,true);
        
        if ($student_id!=$student_id_orig) {
            $response2 = Http::withToken($token)->put("http://localhost:8003/student1/".$student_id_orig, [
                'role'=> ''
            ]);
            $response2 = Http::withToken($token)->put("http://localhost:8003/student1/".$student_id, [
                'role'=> $id
            ]);
        }
        else{
            $response2 = Http::withToken($token)->put("http://localhost:8003/student1/".$student_id_orig, [
                'role'=> $student_id_orig
            ]);
        }

        for ($i=0; $i < count($subject); $i++) { 
            if($course_id==$subject[$i]['course'] and $year== $subject[$i]['year'] and $semester==$subject[$i]['semester']){
                $response1 = Http::withToken($token)->post("http://localhost:8003/studentrole1", [
                    'id' => $id,
                    'student_id' => $student_id,
                    'subject_id' => $subject[$i]['id'],
                    'section' => $section_id,
                    'date' => $date,
                ]);
            }
        }
        
        Session::flash('statuscode','success');
        return redirect('/student-role')->with('status','Student Role Updated Successfully.');
    }
    public function deleteStudentRole($id){
        $token = Auth::user()->security_token;
        
        $response1 = Http::withToken($token)->get("http://localhost:8003/student1");
        $student = json_decode($response1,true);

        for ($i=0; $i < count($student); $i++) { 
            if ($student[$i]['role']==$id) {
                $response2 = Http::withToken($token)->put("http://localhost:8003/student1/".$student[$i]['id'], [
                    'role'=> ''
                ]);
            }
        }
        

        $response = Http::withToken($token)->delete("http://localhost:8003/studentrole1/".$id);

        return response()->json(['status'=>'Poof! Student Role is deleted.']);
    }

    public function viewSubject($id){
        $token = Auth::user()->security_token;
        $studentrole = Http::withToken($token)->get("http://localhost:8003/studentrole1/".$id);

        $response1 = Http::withToken($token)->get("http://localhost:8003/student1");
        $student = json_decode($response1,true);

        $response3 = Http::withToken($token)->get("http://localhost:8003/subject1");
        $subject = json_decode($response3,true);

        $response2 = Http::withToken($token)->get("http://localhost:8003/course1");
        $course = json_decode($response2,true);

        $response4 = Http::withToken($token)->get("http://localhost:8003/instructor1");
        $instructor = json_decode($response4,true);

        $response5 = Http::withToken($token)->get("http://localhost:8003/studentrole1");
        $studentrole2 = json_decode($response5,true);

        return view ('role.student-view-subject')->with('studentrole',$studentrole)->with('student',$student)->with('subject',$subject)->with('course',$course)->with('instructor',$instructor)->with('studentrole2',$studentrole2);
    }
    
}
