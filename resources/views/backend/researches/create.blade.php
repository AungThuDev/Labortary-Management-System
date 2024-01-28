@extends('layouts.master')
@section('research-active','nav-link active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 d-flex align-items-center">Create Research Form</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
                        <a href="{{route('admin.researches')}}" class="btn btn-outline-success"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <form action="{{route('admin.researches.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name"><i class="fas fa-tasks"></i>&nbsp;Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="member_id"><i class="fas fa-users"></i>&nbsp;Member Name</label>
                    <select class="form-select" name="member_id" aria-label="Default select example">
                        <option selected>Select Member</option>
                        @foreach($members as $member)
                        <option value="{{$member->id}}">{{$member->name}}</option>
                        @endforeach    
                    </select>
                </div>
                <div class="form-group">
                    <label for="image"><i class="fas fa-images"></i>&nbsp;Image</label><br>
                    <input type="file" name="image" class="">
                    @error('image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-center mb-5">
                    <button class="btn btn-outline-success"><i class="fas fa-tasks"></i>&nbsp;Create New Research</button>
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
    #form {
        border: 1px solid black;
        background-color: aquamarine;
    }
</style>
@endsection