@extends('layouts.master')
@section('news-active','nav-link active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">News Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
              <a href="{{route('admin.news.create')}}" class="btn btn-outline-success"><i class="fas fa-plus-circle"></i>&nbsp;Create News</a>
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
                    <th>Id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Date</th>
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
                url : "/admin/news/",
                error : function(xhr, textStatus, errorThrown) {
                }
            },
            "columns" : [
                {
                    "data" : "id",
                },
                {
                    "data" : "title",
                },
                
                {
                    "data" : "image",
                },
                {
                  "data" : 'date'
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
              url : '/admin/news/' + id,
              type : 'DELETE',
              success : function(){
                table.ajax.reload();
              }
            });
          }
        }
      )
      });
    </script>
    @endsection