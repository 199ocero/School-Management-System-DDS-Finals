<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DepartmentController extends Controller
{
    public function registeredDepartment(){
        $admin = Admin::all();
        return view('department.department')->with('admin',$admin);
    }
    public function createAdmin(Request $request){
        $admin = new Admin();

        $year = date('Y');
        $day = date('d');
        $month = date('m');

        $admin->id = uniqid("$year$month$day-");
        $admin->fname = $request->input('fname');
        $admin->lname = $request->input('lname');
        $admin->email = $request->input('email');
        $passhash = Hash::make($request->input('password'));
        $admin->password = $passhash;

        $admin->save();
        return redirect('/admin');

    }
    public function editAdmin($id){
        $admin = Admin::findOrFail($id);
        return view('admin.admin-edit')->with('admin',$admin);
    }

    public function updateAdmin(Request $request,$id){
        $admin = Admin::find($id);
        $newpass = $_POST['new_pass'];
        

        if(empty($newpass)){
            $admin->fname = $request->input('fname');
            $admin->lname = $request->input('lname');
            $admin->email = $request->input('email');
            $admin->save();
        }else{
            $admin->password = Hash::make($request->input('new_pass'));
            $admin->fname = $request->input('fname');
            $admin->lname = $request->input('lname');
            $admin->email = $request->input('email');
            $admin->save();
            
        }
        return redirect('/admin');
    }
    public function deleteAdmin($id) {
        $user = Admin::findOrFail($id);
        $user->delete();
        return response()->json(['status'=>'Poof! Admin profile is deleted.']);
    }
}
