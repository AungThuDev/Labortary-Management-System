@extends('layouts.master')
@section('content')
@section('subject-active','nav-link active')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Subjects</h1>
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
        <form action="{{route('admin.subjects.update',$subject->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6 form-group">
                    <label for="course_name"><i class="fas fa-chalkboard"></i>&nbsp;CourseName</label>
                    <input type="text" name="course_name" class="form-control @error('course_name') is-invalid @enderror" value="{{$subject->course_name}}">
                    @error('course_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6 form-group">
                    <label for="room"><i class="fas fa-university"></i>&nbsp;Room</label>
                    <input type="text" name="room" class="form-control @error('room') is-invalid @enderror" value="{{$subject->room}}">
                    @error('room')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="instructor_name"><i class="fas fa-user-graduate"></i>&nbsp;InstructorName</label>
                    <input type="text" name="instructor_name" class="form-control @error('instructor_name') is-invalid @enderror" value="{{$subject->instructor_name}}">
                    @error('instructor_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6 form-group">
                    <label for="instructor_email"><i class="fas fa-inbox"></i>&nbsp;InstructorEmail</label>
                    <input type="text" name="instructor_email" class="form-control @error('instructor_email') is-invalid @enderror" value="{{$subject->instructor_email}}">
                    @error('instructor_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="start_date"><i class="fas fa-calendar-alt"></i>&nbsp;StartDate</label>
                    <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{$subject->start_date}}">
                    @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6 form-group">
                    <label for="end_date"><i class="fas fa-calendar-alt"></i>&nbsp;EndDate</label>
                    <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{$subject->end_date}}">
                    @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="time"><i class="fas fa-hourglass-start"></i>&nbsp;ClassHours</label>
                    <input type="text" name="time" class="form-control @error('time') is-invalid @enderror" value="{{$subject->time}}">
                    @error('time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6 form-group">
                    <label for="web_page"><i class="fab fa-chrome"></i>&nbsp;CourseWebPage</label>
                    <input type="text" name="web_page" class="form-control @error('web_page') is-invalid @enderror" value="{{$subject->web_page}}">
                    @error('web_page')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="instructor_office"><i class="fas fa-building"></i>&nbsp;InstructorOffice</label>
                    <input type="text" name="instructor_office" class="form-control @error('instructor_office') is-invalid @enderror" value="{{$subject->instructor_office}}">
                    @error('instructor_office')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6 form-group">
                    <label for="office_hour"><i class="fas fa-hourglass-start"></i>&nbsp;OfficeHours</label>
                    <input type="text" name="office_hour" class="form-control @error('office_hour') is-invalid @enderror" value="{{$subject->office_hour}}">
                    @error('office_hour')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <label for="image"><i class="fas fa-images"></i>&nbsp;Image</label><br>
                    <img src="{{ asset('storage/subjectimages/' . $subject->image) }}" alt="Subject Image" width="200" height="130"><br><br>
                    <input type="file" name="image" id="image" class="" value="{{old('image')}}">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center mb-5">
                <button class="btn btn-outline-success"><i class="fas fa-chalkboard"></i>&nbsp;Create New Subject</button>
            </div>
        </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

