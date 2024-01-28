@extends('layouts.master')
@section('project-active','nav-link active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 d-flex align-items-center">Edit Lab-Photo Form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
              <a href="{{route('admin.projects')}}" class="btn btn-outline-success"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
            
            <form action="{{route('admin.projects.update',$project->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name"><i class="fas fa-tasks"></i>&nbsp;Lab-Photo Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$project->name}}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="image"><i class="fas fa-images"></i>&nbsp;Image</label><br>
                <img src="{{ asset('storage/projectimages/' . $project->image) }}" alt="Project Image" width="200" height="130"><br><br>
                <input type="file" name="image" class="">
                @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="d-flex justify-content-center mb-5">
                <button class="btn btn-outline-success"><i class="fas fa-tasks"></i>&nbsp;Update Photo</button>
            </div>
            
        </form>
            
        
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('extra-css')
    <style>
        #form{
            border: 1px solid black;
            background-color: aquamarine;
        }
    </style>
@endsection