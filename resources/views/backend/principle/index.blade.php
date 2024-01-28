@extends('layouts.master')
@section('principle-active','nav-link active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Principle Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
              @if($hasPrinciple)
                <a href="{{route('admin.principles.create')}}" class="btn btn-outline-success"><i class="fas fa-plus-circle"></i>&nbsp;Create Principle</a>
              @endif
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <table class="table table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('scripts')
    <script>
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url : "/admin/principles/",
                error : function(xhr, textStatus, errorThrown) {
                }
            },
            "columns" : [
                {
                    "data" : "id",
                },
                {
                    "data" : "name",
                },
                {
                  "data" : "position"
                },
                {
                    "data" : "image",
                },
                {
                    "data" : "action",
                }
            ]
        });
        $(document).on('click','.delete',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        Swal.fire({
          title: 'Are you sure, you want to delete?',
          showCancelButton: true,
          confirmButtonText: 'Confirm',
          
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url : '/admin/principles/' + id,
              type : 'DELETE',
              success : function(){
                table.ajax.reload();
                window.location.reload();
              }
            });
          }
        }
      )
      });
    </script>
@endsection