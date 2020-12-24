<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Session;
use Auth;

class AdminController extends Controller
{

    public function registeredAdmin(){
        $admin = User::all();
        return view('admin.admin')->with('admin',$admin);
    }
    public function createAdmin(Request $request){
        $admin = new User();

        $year = date('Y');
        $day = date('d');
        $month = date('m');

        $admin->id = uniqid("$year$month$day-");
        $admin->fname = $request->input('fname');
        $admin->lname = $request->input('lname');
        $admin->email = $request->input('email');
        $passhash = Hash::make($request->input('password'));
        $admin->password = $passhash;
        $admin->role = 'admin'; 

        $admin->save();
        
        Session::flash('statuscode','success');
        return redirect('/admin')->with('status','Admin Profile Created Successfully.');

    }
    public function editAdmin($id){
        $admin = User::findOrFail($id);
        return view('admin.admin-edit')->with('admin',$admin);
    }

    public function updateAdmin(Request $request,$id){
        $admin = User::find($id);
        $newpass = $_POST['new_pass'];
        

        if(empty($newpass)){
            $admin->fname = $request->input('fname');
            $admin->lname = $request->input('lname');
            $admin->email = $request->input('email');
            $admin->update();
        }else{
            $admin->password = Hash::make($request->input('new_pass'));
            $admin->fname = $request->input('fname');
            $admin->lname = $request->input('lname');
            $admin->email = $request->input('email');
            $admin->update();
            
        }
        Session::flash('statuscode','success');
        return redirect('/admin')->with('status','Admin Profile Updated Successfully.');
    }
    public function deleteAdmin($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['status'=>'Poof! Admin profile is deleted.']);
    }
}
