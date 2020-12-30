@extends('layouts.master')

@section('title')
    College | UPortal
@endsection

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit College</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="/college-update/{{$college['id']}}">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label class="col-md">College ID</label>
                    <div class="col-md">
                        <input type="text" name="id" class="form-control rounded-0" value="{{$college['id']}}" readonly>
                    </div>
                    <label class="col-md">College Name</label>
                    <div class="col-md">
                        <input type="text" name="name" class="form-control rounded-0" value="{{$college['name']}}">
                    </div>
                    <label class="col-md">College Code</label>
                    <div class="col-md">
                        <input type="text" name="name" class="form-control rounded-0" value="{{$college['code']}}">
                    </div>
                    <label class="col-md">Date Added</label>
                    <div class="col-md">
                        <input type="text" name="date" class="form-control rounded-0" value="{{$college['date']}}" readonly>
                    </div>
                </div>
                <div class="text-right" style="margin-right: 13px">
                    <a href="/college" class="btn btn-secondary">Cancel</a>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection

@section('scripts')

@endsection