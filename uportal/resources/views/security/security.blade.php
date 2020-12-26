
@extends('layouts.master')

@section('title')
    API Key | UPortal
@endsection

@section('content')

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit API Key</h6>
        </div>
        <div class="card-body">
            <form>
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label class="col-md">API Key</label>
                    <div class="col-md">
                        <input type="text" name="api_key" class="form-control rounded-0" value="{{ Auth::user()->security_token }}" readonly>
                        <small class="form-text" style="color: rgb(49, 49, 49); margin-top:10px">
                            This will be use as your security token to access the different routes.
                            You can generate new token for security purposes or leave as is.
                        </small>
                    </div>
                    
                </div>
                <div class="text-right" style="margin-right: 13px">
                    <button type="submit" name="update" class="btn btn-warning">Generate Key</button>
                </div>
            </form>

        </div>

    </div>
</div>



@endsection

@section('scripts')

@endsection

