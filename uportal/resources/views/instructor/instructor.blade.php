
@extends('layouts.master')

@section('title')
    Instructor | UPortal
@endsection

@section('content')

<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdmin">Add Instructor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/instructor-create" method="POST">
          {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control rounded-0" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                    <label>Middle Name</label>
                    <input type="text" name="mname" class="form-control rounded-0" placeholder="Enter Middle Name" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control rounded-0" placeholder="Enter Last Name" required>
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age" class="form-control rounded-0" placeholder="Enter Age" required>
                </div>
                <div class="form-group">
                    <label>Birth of Date</label>
                    <input type="text" name="birth_of_date" class="form-control rounded-0" data-toggle="datepicker" placeholder="Enter Date of Birth" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control rounded-0" placeholder="Enter Address" required>
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
                <h4 class="card-title">Registered Instructors</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAdmin">Add Instructor</button>
                
            </div>
            <div class="card-body">
                @if (count($instructor)==0)
                    <p style="color: rgb(255, 88, 88)">No records found.</p>
                @else
                    <div class="table-responsive">
                        <table id="adminTable" class="table table-bordered">
                            <thead class=" text-primary">
                                <th>Instructor ID</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Birth of Date</th>
                                <th>Address</th>
                            </thead>
                            <tbody id="myTable">
                                
                                @for($i=0;$i<count($instructor);$i++)
                                    <tr>
                                        
                                        <input type="hidden" class="instructor_del_class" value={{$instructor[$i]['id']}}>
                                        <td>{{$instructor[$i]['id']}}</td>
                                        <td>{{$instructor[$i]['fname']}}</td>
                                        <td>{{$instructor[$i]['mname']}}</td>
                                        <td>{{$instructor[$i]['lname']}}</td>
                                        <td>{{$instructor[$i]['age']}}</td>
                                        <td>{{$instructor[$i]['birth_of_date']}}</td>
                                        <td>{{$instructor[$i]['address']}}</td>
                                        <td style="padding: 0; margin:0">
                                            <a href="/instructor-edit/{{$instructor[$i]['id']}}"><i class="fas fa-user-edit" style="margin: 5px; color: rgb(14, 163, 94)"></i></a>
                                        </td>
                                        <td style="padding: 0; margin:0">
                                            <button type="submit" style="background: none; border:none" class="instructor_delete"><i class="fas fa-trash" style="margin: 5px; color: rgb(255, 67, 67)"></i></button>
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
        $('.instructor_delete').click(function (e){
            e.preventDefault();


            var delete_id = $(this).closest("tr").find('.instructor_del_class').val();
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
                        url: '/instructor-delete/'+delete_id,
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