@extends('layouts.master')

@section('title')
    Course | UPortal
@endsection

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Course</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/course-update/{{$course['id']}}">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label class="col-md">Course ID</label>
                    <div class="col-md">
                        <input type="text" name="id" class="form-control rounded-0" value="{{$course['id']}}" readonly>
                    </div>
                    <label class="col-md">Course Name</label>
                    <div class="col-md">
                        <input type="text" name="name" class="form-control rounded-0" value="{{$course['name']}}">
                    </div>
                    <label class="col-md">Course Code</label>
                    <div class="col-md">
                        <input type="text" name="code" class="form-control rounded-0" value="{{$course['code']}}">
                    </div>
                    <label class="col-md">Date Added</label>
                    <div class="col-md">
                        <input type="text" name="date" class="form-control rounded-0" value="{{$course['date']}}" readonly>
                    </div>
                </div>
                <div class="text-right" style="margin-right: 13px">
                    <a href="/course" class="btn btn-secondary">Cancel</a>
                    <button type="submit" name="update" class="btn btn-warning">Update</button>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection

@section('scripts')

@endsection