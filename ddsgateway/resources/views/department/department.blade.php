
@extends('layouts.master')

@section('title')
    Department | UPortal
@endsection

@section('content')

<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdmin">Add Deparment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin-create" method="POST">
          {{-- {{ csrf_field() }} --}}
            <div class="modal-body">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control rounded-0" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control rounded-0" placeholder="Enter Last Name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control rounded-0" placeholder="Enter Email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id ="password" class="form-control rounded-0" placeholder="Enter Password" required>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" id ="confirm_password" class="form-control rounded-0" placeholder="Confirm Password" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" name="registerbtn" class="btn btn-warning"><i class="fas fa-save"></i> Create</button>
            </div>  
       </form>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Registered Admin</h4>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addAdmin">Add Admin Profile</button>
            </div>
            <div class="card-body">
                <div class="form-group col-xs-3">
                    <input class="form-control rounded-0" id="myInput" type="text" placeholder="Search...">
                </div>
                <div class="table-responsive">
                    <table id="adminTable" class="table">
                        <thead class=" text-primary">
                            <th>Admin ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($admin as $data)
                                <tr>
                                    <input type="hidden" class="admin_del_class" value="{{$data->id}}">
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->fname}}</td>
                                    <td>{{$data->lname}}</td>
                                    <td>{{$data->email}}</td>
                                    <td style="padding: 0; margin:0">
                                        <a href="/admin-edit/{{$data->id}}"><i class="fas fa-user-edit" style="margin: 5px; color: rgb(14, 163, 94)"></i></a>
                                    </td>
                                    <td style="padding: 0; margin:0">
                                        <form action="/admin-delete/{{$data->id}}" method="post">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" style="background: none; border:none" class="admin_delete"><i class="fas fa-trash" style="margin: 5px; color: rgb(255, 67, 67)"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Password does not match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.admin_delete').click(function (e){
            e.preventDefault();


            var delete_id = $(this).closest("tr").find('.admin_del_class').val();
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
                        "_token": $('input[name="csrf-token"]').val(),
                        "id": delete_id ,
                    };
                    $.ajax({
                        type: "DELETE",
                        url: '/admin-delete/'+delete_id,
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