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
                    <label class="col-md">Name</label>
                    <div class="col-md">
                        <input type="text" name="name" class="form-control rounded-0" value="{{$subject['name']}}">
                    </div>
                    <label class="col-md">Code</label>
                    <div class="col-md">
                        <input type="text" name="code" class="form-control rounded-0" value="{{$subject['code']}}">
                    </div>
                    <label class="col-md">Year</label>
                    <div class="col-md">
                        <select class="form-control rounded-0" name="year">
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
                        <select class="form-control rounded-0" name="semester">
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
                        <label>Course</label>
                        <select class="form-control rounded-0" name="course">
                            @for ($i = 0; $i < count($course); $i++)
                                <option>{{$course[$i]['name']}}</option>  
                            @endfor
                        </select>
                        <small>If ever you forgot what course you've selected, here it is: <strong>{{$subject['course']}}</strong>. If you want to choose another course please do so.</small>
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

@endsection