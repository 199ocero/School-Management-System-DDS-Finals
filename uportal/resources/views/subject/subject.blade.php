
@extends('layouts.master')

@section('title')
    Subject | UPortal
@endsection

@section('content')

<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdmin">Add Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/subject-create" method="POST">
          {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label>Subject Name</label>
                    <input type="text" name="name" class="form-control rounded-0" placeholder="Enter Subject Name" required>
                </div>
                <div class="form-group">
                    <label>Subject Code</label>
                    <input type="text" name="code" class="form-control rounded-0" placeholder="Enter Subject Code" required>
                </div>
                <div class="form-group">
                    <label>Course</label>
                    <select class="form-control rounded-0 select_list" name="course" data-live-search="true" data-style="btn-primary" required>
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
                    <label>Instructor</label>
                    <select class="form-control rounded-0 select_list" name="instructor" data-live-search="true" data-style="btn-primary" required>
                        <option value="" disabled selected>Please select an instructor</option>
                        @for ($i = 0; $i < count($instructor); $i++)
                            <option value={{$instructor[$i]['id']}}>{{$instructor[$i]['fname']}} {{$instructor[$i]['mname'][0]}}. {{$instructor[$i]['lname']}}</option>
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
                <h4 class="card-title">Registered Subjects</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAdmin">Add Subject</button>
                
            </div>
            <div class="card-body">
                @if (count($subject)==0)
                    <p style="color: rgb(255, 88, 88)">No records found.</p>
                @else
                    <div class="table-responsive">
                        <table id="adminTable" class="table table-bordered">
                            <thead class="text-primary">
                                <th>Subject ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Year</th>
                                <th>Semester</th>
                                <th>Instructor</th>
                                <th>Course</th>
                                <th>College</th>
                                <th>Date Added</th>
                            </thead>
                            <tbody id="myTable">
                                
                                @for($i=0;$i<count($subject);$i++)
                                    <tr>
                                        
                                        <input type="hidden" class="subject_del_class" value={{$subject[$i]['id']}}>
                                        <td>{{$subject[$i]['id']}}</td>
                                        <td>{{$subject[$i]['name']}}</td>
                                        <td>{{$subject[$i]['code']}}</td>
                                        <td>{{$subject[$i]['year']}}</td>
                                        <td>{{$subject[$i]['semester']}}</td>
                                        @for ($y = 0; $y < count($instructor); $y++)
                                            @if ($instructor[$y]['id']==$subject[$i]['instructor'])
                                                <td>{{$instructor[$y]['fname']}} {{$instructor[$y]['mname'][0]}}. {{$instructor[$y]['lname']}}</td>
                                            @endif
                                        @endfor
                                        @for ($j = 0; $j < count($course); $j++)
                                            @if ($course[$j]['id']==$subject[$i]['course'])
                                                <td>{{$course[$j]['name']}}</td>
                                            @endif
                                        @endfor
                                        @for ($x = 0; $x < count($college); $x++)
                                            @if ($college[$x]['id']==$subject[$i]['college'])
                                                <td>{{$college[$x]['code']}}</td>
                                            @endif
                                        @endfor
                                        <td>{{$subject[$i]['date']}}</td>
                                        <td class="text-center">
                                            <a href="/subject-edit/{{$subject[$i]['id']}}"><i class="fas fa-user-edit" style="margin: 5px; color: rgb(14, 163, 94)"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <button type="submit" style="background: none; border:none" class="subject_delete"><i class="fas fa-trash" style="margin: 5px; color: rgb(255, 67, 67)"></i></button>
                                        </td>
                                    </tr>
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

    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.subject_delete').click(function (e){
            e.preventDefault();


            var delete_id = $(this).closest("tr").find('.subject_del_class').val();
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
                        url: '/subject-delete/'+delete_id,
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
        
    });
    $(".select_list").selectpicker();
</script>
@endsection

