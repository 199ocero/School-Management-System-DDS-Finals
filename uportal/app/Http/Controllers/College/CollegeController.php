<?php

namespace App\Http\Controllers\College;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Auth;

class CollegeController extends Controller
{

    public function registeredCollege(){

        
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->get("http://localhost:8003/college1");
        $college = json_decode($response,true);
        
        return view('college.college')->with('college',$college);
    }

    public function createCollege(Request $request){

        $year = date('Y');
        $day = date('d');
        $month = date('m');

        $id= uniqid("$year$month$day-");
        $name= $request->input('name');
        $code= $request->input('code');
        $date = date("F j, Y");

        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->post("http://localhost:8003/college1", [
            'id' => $id,
            'name'=> $name,
            'code'=> $code,
            'date' => $date,
        ]);
        
        Session::flash('statuscode','success');
        return redirect('/college')->with('status','College Created Successfully.');
    }

    public function editCollege($id){
        $token = Auth::user()->security_token;
        $college = Http::withToken($token)->get("http://localhost:8003/college1/".$id);

        return view('college.college-edit')->with('college',$college);
    }
    public function updateCollege(Request $request,$id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->put("http://localhost:8003/college1/".$id,[
            'id' =>$request->input('id'),
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'date' =>$request->input('date')
        ]);

        Session::flash('statuscode','success');
        return redirect('/college')->with('status','College Updated Successfully.');
    }
    public function deleteCollege($id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->delete("http://localhost:8003/college1/".$id);
        
        return response()->json(['status'=>'Poof! College is deleted.']);
    }
}
