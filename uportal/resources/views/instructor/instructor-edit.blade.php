@extends('layouts.master')

@section('title')
    Instructor | UPortal
@endsection

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Instructor</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/instructor-update/{{$instructor['id']}}">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label class="col-md">Instructor ID</label>
                    <div class="col-md">
                        <input type="text" name="id" class="form-control rounded-0" value="{{$instructor['id']}}" readonly>
                    </div>
                    <label class="col-md">First Name</label>
                    <div class="col-md">
                        <input type="text" name="fname" class="form-control rounded-0" value="{{$instructor['fname']}}">
                    </div>
                    <label class="col-md">Middle Name</label>
                    <div class="col-md">
                        <input type="text" name="mname" class="form-control rounded-0" value="{{$instructor['mname']}}">
                    </div>
                    <label class="col-md">Last Name</label>
                    <div class="col-md">
                        <input type="text" name="lname" class="form-control rounded-0" value="{{$instructor['lname']}}">
                    </div>
                    <label class="col-md">Age</label>
                    <div class="col-md">
                        <input type="number" name="age" class="form-control rounded-0" value="{{$instructor['age']}}">
                    </div>
                    <label class="col-md">Birth of Date</label>
                    <div class="col-md">
                        <input type="text" name="birth_of_date" class="form-control rounded-0" value="{{$instructor['birth_of_date']}}" required>
                    </div>
                    <label class="col-md">Address</label>
                    <div class="col-md">
                        <input type="text" name="address" class="form-control rounded-0" value="{{$instructor['address']}}">
                    </div>
                </div>
                <div class="text-right" style="margin-right: 13px">
                    <a href="/instructor" class="btn btn-secondary">Cancel</a>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection

@section('scripts')
@endsection