<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Auth;

class SubjectController extends Controller
{
    public function registeredSubject(){

        
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->get("http://localhost:8003/subject1");
        $subject = json_decode($response,true);
        
        $response1 = Http::withToken($token)->get("http://localhost:8003/course1");
        $course = json_decode($response1,true);

        $response2 = Http::withToken($token)->get("http://localhost:8003/instructor1");
        $instructor = json_decode($response2,true);

        $response3 = Http::withToken($token)->get("http://localhost:8003/college1");
        $college = json_decode($response3,true);

        return view('subject.subject')->with('subject',$subject)->with('course',$course)->with('instructor',$instructor)->with('college',$college);
    }

    public function createSubject(Request $request){

        $token = Auth::user()->security_token;

        $response1 = Http::withToken($token)->get("http://localhost:8003/course1");
        $course1 = json_decode($response1,true);

        $response2 = Http::withToken($token)->get("http://localhost:8003/college1");
        $college1 = json_decode($response2,true);

        $course = $request->input('course');

        $collegecode=null;

        for ($i=0; $i < count($course1); $i++) { 
            if ($course==$course1[$i]['id']) {
                for ($j=0; $j < count($college1); $j++) { 
                    if ($course1[$i]['college']==$college1[$j]['id']) {
                        $collegecode = $college1[$j]['id'];
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
        $instructor = $request->input('instructor');
        
        $date = date("F j, Y");

        $response3 = Http::withToken($token)->post("http://localhost:8003/subject1", [
            'id' => $id,
            'name'=> $name,
            'code'=>$code,
            'year'=>$year,
            'semester'=>$semester,
            'instructor'=>$instructor,
            'course'=>$course,
            'college'=>$collegecode,
            'date' => $date
        ]);
        
        Session::flash('statuscode','success');
        return redirect('/subject')->with('status','Subject Created Successfully.');
    }

    public function editSubject($id){
        $token = Auth::user()->security_token;
        $subject = Http::withToken($token)->get("http://localhost:8003/subject1/".$id);

        $response1 = Http::withToken($token)->get("http://localhost:8003/course1");
        $course = json_decode($response1,true);

        $response2 = Http::withToken($token)->get("http://localhost:8003/instructor1");
        $instructor = json_decode($response2,true);

        return view('subject.subject-edit')->with('subject',$subject)->with('course',$course)->with('instructor',$instructor);
    }
    public function updateSubject(Request $request,$id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->get("http://localhost:8003/college1");
        $college1 = json_decode($response,true);

        $response1 = Http::withToken($token)->get("http://localhost:8003/course1");
        $course1 = json_decode($response1,true);

        $course = $request->input('course');

        $collegecode=null;

        for ($i=0; $i < count($course1); $i++) { 
            if ($course==$course1[$i]['id']) {
                for ($j=0; $j < count($college1); $j++) { 
                    if ($course1[$i]['college']==$college1[$j]['id']) {
                        $collegecode = $college1[$j]['id'];
                    }
                }
            }
        }

        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->put("http://localhost:8003/subject1/".$id,[
            'id' =>$request->input('id'),
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'year' => $request->input('year'),
            'semester' => $request->input('semester'),
            'instructor' => $request->input('instructor'),
            'course' => $request->input('course'),
            'college' => $collegecode,
            'date' =>$request->input('date')
        ]);

        Session::flash('statuscode','success');
        return redirect('/subject')->with('status','Subject Updated Successfully.');
    }
    public function deleteSubject($id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->delete("http://localhost:8003/subject1/".$id);
        
        return response()->json(['status'=>'Poof! Subject is deleted.']);
    }

    
}
