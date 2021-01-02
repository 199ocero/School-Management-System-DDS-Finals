
@extends('layouts.master')

@section('title')
    Student Role | UPortal
@endsection

@section('content')

<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdmin">Add Student Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/studentrole-create" method="POST">
          {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label>Student Name</label>
                    <select class="form-control rounded-0 select_list" name="student_id" data-live-search="true" data-style="btn-primary" required>
                        <option value="" disabled selected>Please select a name</option>
                        @for ($i = 0; $i < count($student); $i++)
                            <option value={{$student[$i]['id']}}>{{$student[$i]['fname']}} {{$student[$i]['mname'][0]}}. {{$student[$i]['lname']}}</option>  
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label>Course</label>
                    <select class="form-control rounded-0 select_list" name="course_id" data-live-search="true" data-style="btn-primary" required>
                        <option value="" disabled selected>Please select a course</option>
                        @for ($i = 0; $i < count($course); $i++)
                            <option value={{$course[$i]['id']}}>{{$course[$i]['name']}}</option>  
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <select class="form-control rounded-0 select_list" name="year" data-live-search="true" data-style="btn-primary" required>
                        <option value="" disabled selected>Please select a year</option>
                        <option>1st Year</option>
                        <option>2nd Year</option>
                        <option>3rd Year</option>
                        <option>4th Year</option>
                        <option>5th Year</option>
                    </select>
                            
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <select class="form-control rounded-0 select_list" name="semester" data-live-search="true" data-style="btn-primary" required>
                        <option value="" disabled selected>Please select a semester</option>
                        <option>1st Semester</option>
                        <option>2nd Semester</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Section</label>
                    <select class="form-control rounded-0 select_list" name="section_id" data-live-search="true" data-style="btn-primary">
                        <option value="" disabled selected>Please select a section</option>
                        @for ($i = 0; $i < count($section); $i++)
                            <option value={{$section[$i]['id']}}>{{$section[$i]['name']}}</option>  
                        @endfor
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" name="registerbtn" class="btn btn-primary"><i class="fas fa-save"></i> Create</button>
            </div>  
       </form>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Registered Student Roles</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAdmin">Add Student Role</button>
                
            </div>
            <div class="card-body">
                @if (count($studentrole)==0)
                    <p style="color: rgb(255, 88, 88)">No records found.</p>
                @else
                    <div class="table-responsive">
                        <table id="adminTable" class="table table">
                            <thead class="text-primary">
                                <th>Role ID</th>
                                <th>Student Name</th>
                                <th>Subjects</th>
                                <th>Section</th>
                                <th>Date</th>
                            </thead>
                            <tbody id="myTable">
                                @for($i=0;$i<count($student);$i++)
                                    @if ($student[$i]['role']!=null)
                                        <tr>
                                            <input type="hidden" class="studentrole_del_class" value={{$student[$i]['role']}}>
                                            <td>{{$student[$i]['role']}}</td>
                                            <td>{{$student[$i]['fname']}} {{$student[$i]['mname'][0]}}. {{$student[$i]['lname']}}</td>
                                            <td style="padding: 0; margin:0">
                                                <a href="studentrole-view-subject/{{$student[$i]['role']}}" class="btn btn-primary rounded-pill btn-sm" style="color: white;">View Subjects</a>
                                            </td>
                                            @for ($x = 0; $x < count($studentrole); $x++)
                                                @if ($student[$i]['role']==$studentrole[$x]['id'])
                                                    @for ($y = 0; $y < count($section); $y++)
                                                        @if ($studentrole[$x]['section']==$section[$y]['id'])
                                                            <td>{{$section[$y]['name']}}</td>
                                                        @endif
                                                    @endfor
                                                    <td>{{$studentrole[$x]['date']}}</td>
                                                    
                                                    @break
                                                @endif
                                            @endfor
                                            <td style="padding: 0; margin:0">
                                                <a href="/studentrole-edit/{{$student[$i]['role']}}"><i class="fas fa-user-edit" style="margin: 5px; color: rgb(14, 163, 94)"></i></a>
                                            </td>
                                            <td style="padding: 0; margin:0">
                                                <button type="submit" style="background: none; border:none" class="studentrole_delete"><i class="fas fa-trash" style="margin: 5px; color: rgb(255, 67, 67)"></i></button>
                                            </td>
                                        </tr>
                                    @endif
                                @endfor
                                
                            </tbody>
                        </table>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous"></script>
<script>

    $(function() {
        $('[data-toggle="datepicker"]').datepicker({
            autoHide: true,
            zIndex: 2048,
        });
    });
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.studentrole_delete').click(function (e){
            e.preventDefault();


            var delete_id = $(this).closest("tr").find('.studentrole_del_class').val();
            //alert(delete_id);
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
            .then((willDelete) => {
                if (willDelete) {

                    var data = {
                        "_token": $('input[name=_token]').val(),
                        "id": delete_id ,
                    };
                    $.ajax({
                        type: "DELETE",
                        url: '/studentrole-delete/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            })
                            .then((result) =>{
                                location.reload();
                            });
                        }
                    });
                    
                }
            });
        });
        $(".select_list").selectpicker();
    });
    
</script>
@endsection