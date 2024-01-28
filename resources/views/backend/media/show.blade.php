@extends('layouts.master')
@section('news-active','nav-link active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">News Detail Page</h1>
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
        <div class="card">
            <img src="{{ asset('storage/newsimages/' . $media->image) }}" class="card-image-top" alt="news photo" width="1389" height="750">
            <div class="card-body">
                <h3 class="card-title">{{$media->title}}</h3>
                <p class="card-text">{!!nl2br($media->description)!!}</p>
                <a href="{{route('admin.news.edit',$media->id)}}" class="btn btn-outline-success"><i class="far fa-edit"></i>&nbsp;Edit News</a>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
