@extends('layouts.master')
@section('advisor-active','nav-link active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Advisor Form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <a href="{{route('admin.advisors')}}" class="btn btn-outline-success"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form action="{{route('admin.advisors.update',$advisor->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$advisor->name}}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="role">Position</label>
                <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" value="{{$advisor->role}}">
                @error('role')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{$advisor->link}}">
                @error('link')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
              <label for="department">Department</label>
              <input type="text" name="department" class="form-control @error('department') is-invalid @enderror" value="{{$advisor->department}}">
              @error('department')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <div class="form-group">
            <label for="uinversity">University</label>
            <input type="text" name="university" class="form-control @error('university') is-invalid @enderror" value="{{$advisor->university}}">
            @error('uinversity')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
            <div class="form-group">
                <label for="image"><i class="fas fa-images"></i>&nbsp;Image</label><br>
                <img src="{{ asset('storage/advisorimages/' . $advisor->image) }}" alt="News Image" width="150" height="150"><br><br>
                <input type="file" name="image">
                @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="d-flex justify-content-center mb-5">
                <button class="btn btn-outline-success"><i class="fas fa-user-plus"></i>&nbsp;Create New Advisor</button>
            </div>
        </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

