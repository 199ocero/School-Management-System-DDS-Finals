
@extends('layouts.master')

@section('title')
    Department | UPortal
@endsection

@section('content')

<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdmin">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/department-create" method="POST">
          {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label>Department Name</label>
                    <input type="text" name="name" class="form-control rounded-0" placeholder="Enter Department Name" required>
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
                <h4 class="card-title">Registered Department</h4>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addAdmin">Add Department</button>
                
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table id="adminTable" class="table">
                        <thead class=" text-primary">
                            <th>Department ID</th>
                            <th>Department Name</th>
                            <th>Date Added</th>
                        </thead>
                        <tbody id="myTable">
                            
                            @for($i=0;$i<count($department);$i++)
                                <tr>
                                    
                                    <input type="hidden" class="department_del_class" value={{$department[$i]['id']}}>
                                    <td>{{$department[$i]['id']}}</td>
                                    <td>{{$department[$i]['name']}}</td>
                                    <td>{{$department[$i]['date']}}</td>
                                    <td style="padding: 0; margin:0">
                                        <a href="/department-edit/{{$department[$i]['id']}}"><i class="fas fa-user-edit" style="margin: 5px; color: rgb(14, 163, 94)"></i></a>
                                    </td>
                                    <td style="padding: 0; margin:0">
                                        <button type="submit" style="background: none; border:none" class="department_delete"><i class="fas fa-trash" style="margin: 5px; color: rgb(255, 67, 67)"></i></button>
                                    </td>
                                </tr>
                            @endfor
                            
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

    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.department_delete').click(function (e){
            e.preventDefault();


            var delete_id = $(this).closest("tr").find('.department_del_class').val();
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
                        url: '/department-delete/'+delete_id,
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

