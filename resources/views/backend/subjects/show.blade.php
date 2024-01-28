@extends('layouts.master')
@section('content')
@section('subject-active','nav-link active')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Subjects Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
              <a href="{{route('admin.subjects')}}" class="btn btn-outline-success"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="card mb-4 p-3" style="max-width: 1000px; margin: auto">
            <div class="d-flex justify-content-between mb-3">
                <h4>Course Title - {{ $subject->course_name }}</h4>
                    <p>Start: {{ $subject->start_date }}</p>
                    <p>End: {{ $subject->end_date }}</p>
            </div>
            <img src="{{ asset('storage/subjectimages/' . $subject->image) }}" alt="Subject Image" width="200" height="280"><br><br>
            <p>Classroom - {{$subject->room}}</p>
            <p>Classroom Hour - {{$subject->time}}</p>
            <p>Instructor Name - {{ $subject->instructor_name }}</p>
            <p>Instructor Email - {{ $subject->instructor_email }}</p>
            <p>Office - {{$subject->instructor_office}}</p>
            <p>Web Page - <a href="{{$subject->web_page}}">{{$subject->web_page}}</a></p>
            <div class="d-flex justify-content-between">
                <p>Office Hour - {{$subject->office_hour}} </p>
                <a href="{{route('admin.subjects.edit',$subject->id)}}" class="btn btn-outline-success"><i class="fas fa-edit"></i>&nbsp;Edit</a>
            </div>
           
      </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
