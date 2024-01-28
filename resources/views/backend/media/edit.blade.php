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
              <a href="{{route('admin.news')}}" class="btn btn-outline-success"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <form action="{{route('admin.news.update',$media->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title"><i class="fas fa-tasks"></i>&nbsp;News Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$media->title}}">
                @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description"><i class="fas fa-audio-description"></i>News Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{$media->description}}</textarea>
                @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="image"><i class="fas fa-images"></i>&nbsp;Image</label><br>
                <img src="{{ asset('storage/newsimages/' . $media->image) }}" alt="News Image" width="200" height="130"><br><br>
                <input type="file" name="image" class="">
                @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="d-flex justify-content-center mb-5">
                <button class="btn btn-outline-success"><i class="fas fa-newspaper"></i>&nbsp;Update News</button>
            </div>
            
        </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
