@extends('layouts.master')

@section('title')
    Subject | UPortal
@endsection

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Subject</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/subject-update/{{$subject['id']}}">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label class="col-md">Subject ID</label>
                    <div class="col-md">
                        <input type="text" name="id" class="form-control rounded-0" value="{{$subject['id']}}" readonly>
                    </div>
                    <label class="col-md">Subject Name</label>
                    <div class="col-md">
                        <input type="text" name="name" class="form-control rounded-0" value="{{$subject['name']}}" required>
                    </div>
                    <label class="col-md">Subject Code</label>
                    <div class="col-md">
                        <input type="text" name="code" class="form-control rounded-0" value="{{$subject['code']}}" required>
                    </div>
                    <label class="col-md">Course</label>
                    <div class="col-md">
                        <select class="form-control rounded-0 select_list" name="course" data-live-search="true" data-style="btn-primary" required>
                            <option value="" disabled selected>Please select a course</option>
                            @for ($i = 0; $i < count($course); $i++)
                                @if ($subject['course']==$course[$i]['id'])
                                    <option value={{$course[$i]['id']}} selected>{{$course[$i]['name']}}</option>
                                @else
                                    <option value={{$course[$i]['id']}}>{{$course[$i]['name']}}</option>  
                                @endif
                            @endfor
                        </select>
                    </div>
                    <label class="col-md">Year</label>
                    <div class="col-md">
                        <select class="form-control rounded-0 select_list" name="year" data-live-search="true" data-style="btn-primary" required>
                            @switch($subject['year'])
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
                        </select>
                    </div>
                    <label class="col-md">Semester</label>
                    <div class="col-md">
                        <select class="form-control rounded-0 select_list" name="semester" data-live-search="true" data-style="btn-primary" required>
                            @switch($subject['semester'])
                                @case('1st Semester')
                                    <option selected>1st Semester</option>
                                    <option>2nd Semester</option>
                                    @break
                                @case('2nd Semester')
                                    <option>1st Semester</option>
                                    <option selected>2nd Semester</option>
                                    @break
                                @default
                                    
                            @endswitch
                        </select>  
                    </div>
                    <div class="col-md">
                        <label>Instructor</label>
                        <select class="form-control rounded-0 select_list" name="instructor" data-live-search="true" data-style="btn-primary" required>
                            @for ($i = 0; $i < count($instructor); $i++)
                                @if ($subject['instructor']==$instructor[$i]['id'])
                                    <option value={{$instructor[$i]['id']}} selected>{{$instructor[$i]['fname']}} {{$instructor[$i]['mname'][0]}}. {{$instructor[$i]['lname']}}</option>
                                @else
                                    <option value={{$instructor[$i]['id']}}>{{$instructor[$i]['fname']}} {{$instructor[$i]['mname'][0]}}. {{$instructor[$i]['lname']}}</option>
                                @endif 
                            @endfor
                        </select>
                    </div>
                    <label class="col-md">Date Added</label>
                    <div class="col-md">
                        <input type="text" name="date" class="form-control rounded-0" value="{{$subject['date']}}" readonly>
                    </div>
                </div>
                <div class="text-right" style="margin-right: 13px">
                    <a href="/subject" class="btn btn-secondary">Cancel</a>
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