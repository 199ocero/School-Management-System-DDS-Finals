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
                        <input type="text" name="name" class="form-control rounded-0" value="{{$course['name']}}" required>
                    </div>
                    <label class="col-md">Course Code</label>
                    <div class="col-md">
                        <input type="text" name="code" class="form-control rounded-0" value="{{$course['code']}}" required>
                    </div>
                    <label class="col-md" style="margin-top: 3px">College</label>
                    <div class="col-md">
                        <select class="form-control rounded-0 select_list" name="course" data-live-search="true" data-style="btn-primary" required>
                            @for ($i = 0; $i < count($college); $i++)
                                @if ($college[$i]['id']==$course['college'])
                                    <option selected>{{$college[$i]['name']}}</option>
                                @else
                                    <option>{{$college[$i]['name']}}</option>
                                @endif      
                            @endfor
                        </select>
                    </div>
                    <label class="col-md">Date Added</label>
                    <div class="col-md">
                        <input type="text" name="date" class="form-control rounded-0" value="{{$course['date']}}" readonly>
                    </div>
                </div>
                <div class="text-right" style="margin-right: 13px">
                    <a href="/course" class="btn btn-secondary">Cancel</a>
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