
@extends('layouts.master')

@section('title')
    Course | UPortal
@endsection

@section('content')

<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdmin">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/course-create" method="POST">
          {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label>Course Name</label>
                    <input type="text" name="name" class="form-control rounded-0" placeholder="Enter Course Name" required>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Course Code</label>
                    <input type="text" name="code" class="form-control rounded-0" placeholder="Enter Course Name" required>
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
                <h4 class="card-title">Registered Courses</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAdmin">Add Course</button>
                
            </div>
            <div class="card-body">
                @if (count($course)==0)
                    <p style="color: rgb(255, 88, 88)">No records found.</p>
                @else
                    <div class="table-responsive">
                        <table id="adminTable" class="table">
                            <thead class=" text-primary">
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th>Course Code</th>
                                <th>Date Added</th>
                            </thead>
                            <tbody id="myTable">
                                
                                @for($i=0;$i<count($course);$i++)
                                    <tr>
                                        
                                        <input type="hidden" class="course_del_class" value={{$course[$i]['id']}}>
                                        <td>{{$course[$i]['id']}}</td>
                                        <td>{{$course[$i]['name']}}</td>
                                        <td>{{$course[$i]['code']}}</td>
                                        <td>{{$course[$i]['date']}}</td>
                                        <td style="padding: 0; margin:0">
                                            <a href="/course-edit/{{$course[$i]['id']}}"><i class="fas fa-user-edit" style="margin: 5px; color: rgb(14, 163, 94)"></i></a>
                                        </td>
                                        <td style="padding: 0; margin:0">
                                            <button type="submit" style="background: none; border:none" class="course_delete"><i class="fas fa-trash" style="margin: 5px; color: rgb(255, 67, 67)"></i></button>
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
<script>

    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.course_delete').click(function (e){
            e.preventDefault();


            var delete_id = $(this).closest("tr").find('.course_del_class').val();
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
                        url: '/course-delete/'+delete_id,
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
</script>
@endsection

