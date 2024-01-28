@extends('layouts.master')
@section('user-active','nav-link active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 d-flex align-items-center">Edit Admin User Form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
              <a href="{{route('admin.users')}}" class="btn btn-outline-success"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
            
            <form action="{{route('admin.users.update',$user->id)}}" method="POST" class="mt-5">
            @csrf
            @method('PUT')
            @if(Session::has('error'))
                <p class="alert alert-info">{{ Session::get('error') }}</p>
            @endif
            <div class="form-group">
                <label for="name"><i class="far fa-user-circle"></i>&nbsp;User Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i>&nbsp;User Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="old_password"><i class="fas fa-unlock-alt"></i>&nbsp;Old Password</label>
                <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror">
                @error('old_password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="new_password"><i class="fas fa-unlock-alt"></i>&nbsp;New Password</label>
                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror">
                @error('new_password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="d-flex justify-content-center mb-5">
                <button class="btn btn-outline-success"><i class="fas fa-user-plus"></i>&nbsp;Update User</button>
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