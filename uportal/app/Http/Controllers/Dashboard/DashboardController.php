<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function getDashboard(){

        //token
        $token = Auth::user()->security_token;

        //admin count
        $admin = User::count();

        //department count
        
        $response = Http::withToken($token)->get("http://localhost:8003/department1");
        $department = json_decode($response,true);

        //course count
        $response = Http::withToken($token)->get("http://localhost:8003/course1");
        $course = json_decode($response,true);

        //subject count
        $response = Http::withToken($token)->get("http://localhost:8003/subject1");
        $subject = json_decode($response,true);

        //section count
        $response = Http::withToken($token)->get("http://localhost:8003/section1");
        $section = json_decode($response,true);

        //student count
        $response = Http::withToken($token)->get("http://localhost:8003/student1");
        $student = json_decode($response,true);

        //overall count
        $count = array(
            'admin'=>$admin,
            'department'=>count($department),
            'course'=>count($course),
            'subject'=>count($subject),
            'section'=>count($section),
            'student'=>count($student),
        );

        return view('dashboard.dashboard')->with('count',$count);
        
    }
}
