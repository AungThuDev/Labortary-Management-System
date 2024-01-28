@extends('layouts.master')
@section('member-active','nav-link active')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 d-flex align-items-center">Create Member Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
            <a href="{{route('admin.members')}}" class="btn btn-outline-success"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">


      <form action="{{route('admin.members.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="name"><i class="far fa-user-circle"></i>&nbsp;Name</label>
          <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" autocomplete="name" value="{{old('name')}}">
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="position"><i class="fas fa-graduation-cap"></i>&nbsp;Position</label>
          <input id="position" type="text" name="position" class="form-control @error('position') is-invalid @enderror" autocomplete="position" value="{{old('position')}}">
          @error('position')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="education"><i class="fab fa-researchgate"></i>&nbsp;Educations</label>
          <div class="col-md-6">
            <div id="educationInputs">
              <input id="education[0]" type="text" class="form-control @error('education.*') is-invalid @enderror" name="education[]" autocomplete="education" value="{{old('education.0')}}"><br>
              @error('education.*')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <button type="button" id="addEducationInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Add Education</button>
          </div>
        </div>
        <div class="form-group">
          <label for="about">About</label>
          <textarea name="about" id="about" cols="30" rows="10" class="form-control">{{old('about')}}</textarea>
          @error('about')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <h5>Socail Media Links</h5>
        <div class="form-group">
          <label for="facebook">Facebook Link</label>
          <input id="facebook" type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" autocomplete="facebook" value="{{old('facebook')}}">
          @error('facebook')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="instagram">Instagram Link</label>
          <input id="instagram" type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" autocomplete="instagram" value="{{old('instagram')}}">
          @error('instagram')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="twitter">Twitter Link</label>
          <input id="twitter" type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" autocomplete="twitter" value="{{old('twitter')}}">
          @error('twitter')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="image"><i class="fas fa-images"></i>&nbsp;Image</label><br>
          <input type="file" name="image" id="image" class="" value="{{old('image')}}">
          @error('image')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="d-flex justify-content-center mb-5">
          <button class="btn btn-outline-success"><i class="fas fa-user-plus"></i>&nbsp;Create New Member</button>
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

@section('scripts')
<script>
  document.getElementById('addEducationInput').addEventListener('click', function() {
    var input = document.createElement('input');
    input.type = 'text';
    input.className = 'form-control';
    input.name = 'education[]';
    input.required = true;
    input.autocomplete = 'education';

    document.getElementById('educationInputs').appendChild(input);

  });
</script>
@endsection