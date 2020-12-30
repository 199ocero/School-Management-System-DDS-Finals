<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Auth;

class InstructorController extends Controller
{

    public function registeredInstructor(){
        
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->get("http://localhost:8003/instructor1");
        $instructor = json_decode($response,true);
        
        return view('instructor.instructor')->with('instructor',$instructor);
    }

    public function createInstructor(Request $request){
        $year = date('Y');
        $day = date('d');
        $month = date('m');

        $id= uniqid("$year$month$day-");
        $fname= $request->input('fname');
        $mname= $request->input('mname');
        $lname= $request->input('lname');
        $age= $request->input('age');
        $birth_of_date= $request->input('birth_of_date');
        $address= $request->input('address');

        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->post("http://localhost:8003/instructor1", [
            'id' => $id,
            'fname'=> $fname,
            'mname'=> $mname,
            'lname'=> $lname,
            'age'=> $age,
            'birth_of_date'=> $birth_of_date,
            'address' => $address,
        ]);
        
        Session::flash('statuscode','success');
        return redirect('/instructor')->with('status','Instructor Created Successfully.');
    }

    public function editInstructor($id){
        $token = Auth::user()->security_token;
        $instructor = Http::withToken($token)->get("http://localhost:8003/instructor1/".$id);

        return view('instructor.instructor-edit')->with('instructor',$instructor);
    }
    public function updateInstructor(Request $request,$id){

        $fname= $request->input('fname');
        $mname= $request->input('mname');
        $lname= $request->input('lname');
        $age= $request->input('age');
        $birth_of_date= $request->input('birth_of_date');
        $address= $request->input('address');
        
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->put("http://localhost:8003/instructor1/".$id,[
            'id' => $id,
            'fname'=> $fname,
            'mname'=> $mname,
            'lname'=> $lname,
            'age'=> $age,
            'birth_of_date'=> $birth_of_date,
            'address' => $address,
        ]);

        Session::flash('statuscode','success');
        return redirect('/instructor')->with('status','Instructor Updated Successfully.');
    }
    public function deleteInstructor($id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->delete("http://localhost:8003/instructor1/".$id);
        
        return response()->json(['status'=>'Poof! Instructor is deleted.']);
    }
    
}
