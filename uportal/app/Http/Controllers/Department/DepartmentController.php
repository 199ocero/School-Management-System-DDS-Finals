<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Auth;

class DepartmentController extends Controller
{

    public function registeredDepartment(){

        
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->get("http://localhost:8003/department1");
        $department = json_decode($response,true);
        
        return view('department.department')->with('department',$department);
    }

    public function createDepartment(Request $request){

        $year = date('Y');
        $day = date('d');
        $month = date('m');

        $id= uniqid("$year$month$day-");
        $name= $request->input('name');
        $date = date("F j, Y");

        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->post("http://localhost:8003/department1", [
            'id' => $id,
            'name'=> $name,
            'date' => $date,
        ]);
        
        Session::flash('statuscode','success');
        return redirect('/department')->with('status','Department Created Successfully.');
    }

    public function editDepartment($id){
        $token = Auth::user()->security_token;
        $department = Http::withToken($token)->get("http://localhost:8003/department1/".$id);

        return view('department.department-edit')->with('department',$department);
    }
    public function updateDepartment(Request $request,$id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->put("http://localhost:8003/department1/".$id,[
            'id' =>$request->input('id'),
            'name' => $request->input('name'),
            'date' =>$request->input('date')
        ]);

        Session::flash('statuscode','success');
        return redirect('/department')->with('status','Department Updated Successfully.');
    }
    public function deleteDepartment($id){
        $token = Auth::user()->security_token;
        $response = Http::withToken($token)->delete("http://localhost:8003/department1/".$id);
        
        return response()->json(['status'=>'Poof! Department is deleted.']);
    }
    
}
