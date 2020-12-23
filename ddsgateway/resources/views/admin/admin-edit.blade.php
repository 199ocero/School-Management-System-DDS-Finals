@extends('layouts.master')

@section('title')
    Admin | UPortal
@endsection

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
        </div>

        <div class="card-body">
            <form method="post" action="/admin-update/{{$admin->id}}">
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    <label class="col-md">First Name</label>
                    <div class="col-md">
                        <input type="text" name="fname" class="form-control rounded-0" value="{{$admin->fname}}" placeholder="Enter First Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md">Last Name</label>
                    <div class="col-md">
                        <input type="text" name="lname" class="form-control rounded-0" value="{{$admin->lname}}" placeholder="Enter Last Name" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md">Email</label>
                    <div class="col-md">
                        <input type="text" name="email" class="form-control rounded-0" value="{{$admin->email}}" placeholder="Enter Email" required>
                    </div>     
                </div>
                <div class="form-group">
                    <label class="col-md">Old Password</label>
                    <div class="col-md">
                        <input type="password" name="old_pass" class="form-control rounded-0" value="{{$admin->password}}" placeholder="Enter Password" required readonly>
                    </div>          
                </div>
                <div class="form-group">
                    <label class="col-md">New Password</label>
                    <div class="col-md">
                        <input type="text" name="new_pass" class="form-control rounded-0" placeholder="Enter Password">
                        <small class="form-text" style="color: rgb(255, 174, 0)">Type your new password here or leave blank if you don't want to change.</small>
                    </div>
                              
                </div>
                <div class="text-right">
                    <a href="/admin" class="btn btn-secondary">Cancel</a>
                    <button type="submit" name="update" class="btn btn-warning">Update</button>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection

@section('scripts')

@endsection