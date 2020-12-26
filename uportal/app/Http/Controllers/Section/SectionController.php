<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Auth;

class SectionController extends Controller
{

    public function registeredSection(){

        
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->get("http://localhost:8003/section1");
        $section = json_decode($response,true);
        
        return view('section.section')->with('section',$section);
    }

    public function createSection(Request $request){

        $year = date('Y');
        $day = date('d');
        $month = date('m');

        $id= uniqid("$year$month$day-");
        $name= $request->input('name');
        $date = date("F j, Y");

        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->post("http://localhost:8003/section1", [
            'id' => $id,
            'name'=> $name,
            'date' => $date,
        ]);
        
        Session::flash('statuscode','success');
        return redirect('/section')->with('status','Section Created Successfully.');
    }

    public function editSection($id){
        $token = Auth::user()->security_token;
        $section = Http::withToken($token)->get("http://localhost:8003/section1/".$id);

        return view('section.section-edit')->with('section',$section);
    }
    public function updateSection(Request $request,$id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->put("http://localhost:8003/section1/".$id,[
            'id' =>$request->input('id'),
            'name' => $request->input('name'),
            'date' =>$request->input('date')
        ]);

        Session::flash('statuscode','success');
        return redirect('/section')->with('status','Section Updated Successfully.');
    }
    public function deleteSection($id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->delete("http://localhost:8003/section1/".$id);
        
        return response()->json(['status'=>'Poof! Section is deleted.']);
    }
    
}
