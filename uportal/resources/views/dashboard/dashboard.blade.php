@extends('layouts.master')

@section('title')
    Dashboard | UPortal
@endsection

@section('content')
<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Admins
                        </div>
                        <div class="h1 mb-0 font-weight-normal text-gray-1000">{{$count['admin']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users-cog fa-4x" style="color: rgb(255, 113, 113)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Instructors
                        </div>
                        <div class="h1 mb-0 font-weight-normal text-gray-1000">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-4x" style="color: rgb(255, 188, 62)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Students
                        </div>
                        <div class="h1 mb-0 font-weight-normal text-gray-1000">{{$count['student']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-friends fa-4x" style="color: rgb(19, 223, 121)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Departments
                        </div>
                        <div class="h1 mb-0 font-weight-normal text-gray-1000">{{$count['department']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-home fa-4x" style="color: rgb(61, 210, 255)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Courses
                        </div>
                        <div class="h1 mb-0 font-weight-normal text-gray-1000">{{$count['course']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-scroll fa-4x" style="color: rgb(141, 42, 255)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Subjects
                        </div>
                        <div class="h1 mb-0 font-weight-normal text-gray-1000">{{$count['subject']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-4x" style="color: rgb(219, 67, 161)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Sections
                        </div>
                        <div class="h1 mb-0 font-weight-normal text-gray-1000">{{$count['section']}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chalkboard-teacher fa-4x" style="color: rgb(255, 110, 66)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection