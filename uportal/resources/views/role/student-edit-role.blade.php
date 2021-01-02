@extends('layouts.master')

@section('title')
    Student Role | UPortal
@endsection

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Student Role</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/studentrole-update/{{$studentrole['id']}}">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label class="col-md">Student Role ID</label>
                    <div class="col-md">
                        <input type="text" name="id" class="form-control rounded-0" value="{{$studentrole['id']}}" readonly>
                    </div>
                    <label class="col-md">Student Name</label>
                    <div class="col-md">
                        <input type="hidden" name="student_id_orig" class="form-control rounded-0" value="{{$studentrole['student_id']}}" readonly>
                        <select class="form-control rounded-0 select_list" name="student_id" data-live-search="true" data-style="btn-primary" required>
                            @for ($i = 0; $i < count($student); $i++)
                                @if ($student[$i]['role']!=null and $student[$i]['id']==$studentrole['student_id'])
                                    <option value={{$student[$i]['id']}} selected>{{$student[$i]['fname']}} {{$student[$i]['mname'][0]}}. {{$student[$i]['lname']}}</option>
                                @else
                                    <option value={{$student[$i]['id']}}>{{$student[$i]['fname']}} {{$student[$i]['mname'][0]}}. {{$student[$i]['lname']}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                    <label class="col-md">Course</label>
                    <div class="col-md">
                        <select class="form-control rounded-0 select_list" name="course_id" data-live-search="true" data-style="btn-primary" required>
                            @for ($i = 0; $i < count($subject); $i++)
                                @if ($studentrole['subject_id']==$subject[$i]['id'])
                                    @for ($y = 0; $y < count($course); $y++)
                                        @if ($subject[$i]['course']==$course[$y]['id'])
                                            <option value={{$course[$y]['id']}} selected>{{$course[$y]['name']}}</option>
                                        @else
                                            <option value={{$course[$y]['id']}}>{{$course[$y]['name']}}</option>
                                        @endif
                                    @endfor
                                @endif   
                            @endfor
                        </select>
                    </div>
                    <label class="col-md">Year</label>
                    <div class="col-md">
                        <select class="form-control rounded-0 select_list" name="year" data-live-search="true" data-style="btn-primary" required>
                            @for ($i = 0; $i < count($subject); $i++)
                                @if ($subject[$i]['id']==$studentrole['subject_id'])
                                    @switch($subject[$i]['year'])
                                            @case('1st Year')
                                                <option selected>1st Year</option>
                                                <option>2nd Year</option>
                                                <option>3rd Year</option>
                                                <option>4th Year</option>
                                                <option>5th Year</option>
                                                @break
                                            @case('2nd Year')
                                                <option>1st Year</option>
                                                <option selected>2nd Year</option>
                                                <option>3rd Year</option>
                                                <option>4th Year</option>
                                                <option>5th Year</option>
                                                @break
                                            @case('3rd Year')
                                                <option>1st Year</option>
                                                <option>2nd Year</option>
                                                <option selected>3rd Year</option>
                                                <option>4th Year</option>
                                                <option>5th Year</option>
                                                @break
                                            @case('4th Year')
                                                <option>1st Year</option>
                                                <option>2nd Year</option>
                                                <option>3rd Year</option>
                                                <option selected>4th Year</option>
                                                <option>5th Year</option>
                                                @break
                                            @case('5th Year')
                                                <option>1st Year</option>
                                                <option>2nd Year</option>
                                                <option>3rd Year</option>
                                                <option>4th Year</option>
                                                <option selected>5th Year</option>
                                                @break
                                            @default
                                                <span>Something went wrong, please try again.</span>
                                    @endswitch  
                                @endif
                            @endfor
                            
                        </select>
                    </div>
                    <label class="col-md">Semester</label>
                    <div class="col-md">
                        <select class="form-control rounded-0 select_list" name="semester" data-live-search="true" data-style="btn-primary" required>
                            @for ($i = 0; $i < count($subject); $i++)
                                @if ($subject[$i]['id']==$studentrole['subject_id'])
                                    @switch($subject[$i]['semester'])
                                        @case('1st Semester')
                                            <option selected>1st Semester</option>
                                            <option>2nd Semester</option>
                                            @break
                                        @case('2nd Semester')
                                            <option>1st Semester</option>
                                            <option selected>2nd Semester</option>
                                            @break
                                        @default
                                            <span>Something went wrong, please try again.</span>
                                    @endswitch
                                @endif
                            @endfor
                        </select>  
                    </div>
                    <label class="col-md">Section</label>
                    <div class="col-md">
                        <select class="form-control rounded-0 select_list" name="section_id" data-live-search="true" data-style="btn-primary" required>
                            @for ($i = 0; $i < count($section); $i++)
                                @if ($section[$i]['id']==$studentrole['section'])
                                    <option value={{$section[$i]['id']}} selected>{{$section[$i]['name']}}</option>
                                @else
                                    <option value={{$section[$i]['id']}}>{{$section[$i]['name']}}</option>
                                @endif
                            @endfor
                        </select>  
                    </div>
                    <label class="col-md">Date Added</label>
                    <div class="col-md">
                        <input type="text" name="date" class="form-control rounded-0" value="{{$studentrole['date']}}" readonly>
                    </div>
                </div>
                <div class="text-right" style="margin-right: 13px">
                    <a href="/student-role" class="btn btn-secondary">Cancel</a>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".select_list").selectpicker();
        });
    </script>
@endsection