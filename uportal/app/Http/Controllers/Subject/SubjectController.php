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
        
        return view('subject.subject')->with('subject',$subject);
    }

    public function createSubject(Request $request){

        $year = date('Y');
        $day = date('d');
        $month = date('m');

        $id= uniqid("$year$month$day-");
        $name= $request->input('name');
        $code= $request->input('code');
        $date = date("F j, Y");

        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->post("http://localhost:8003/subject1", [
            'id' => $id,
            'name'=> $name,
            'code'=>$code,
            'date' => $date,
        ]);
        
        Session::flash('statuscode','success');
        return redirect('/subject')->with('status','Subject Created Successfully.');
    }

    public function editSubject($id){
        $token = Auth::user()->security_token;
        $subject = Http::withToken($token)->get("http://localhost:8003/subject1/".$id);

        return view('subject.subject-edit')->with('subject',$subject);
    }
    public function updateSubject(Request $request,$id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->put("http://localhost:8003/subject1/".$id,[
            'id' =>$request->input('id'),
            'name' => $request->input('name'),
            'code' => $request->input('code'),
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
