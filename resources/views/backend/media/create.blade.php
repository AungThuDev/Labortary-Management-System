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
      <form action="{{route('admin.news.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="title"><i class="fas fa-tasks"></i>&nbsp;News Title</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
          @error('title')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="description"><i class="fas fa-audio-description"></i>News Description</label>
          <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
          @error('description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="image"><i class="fas fa-images"></i>&nbsp;Cover Image</label><br>
          <input type="file" name="image" id="image" class="" value="{{old('image')}}">
          @error('image')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        
        <div class="row">
          <div class="col-6">
          <div class="form-group">
              <label for="images"><i class="fas fa-images"></i>&nbsp;Images</label>
              <div class="col-md-12">
                  <div id="imageInputs">
                    <input type="file" class="@error('images.*') is-invalid @enderror" name="images[]" autocomplete="images" multiple value="{{ old('images.0') }}"><br>

                      @error('images.*')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                  <button type="button" class="btn btn-success addImageInput mt-3"><i class="fas fa-plus-circle"></i>&nbsp;Add NewImage</button>
              </div>
          </div>
          </div>
        </div>
      
        <div class="d-flex justify-content-center mb-5">
          <button class="btn btn-outline-success"><i class="fas fa-newspaper"></i>&nbsp;Create News</button>
        </div>

      </form>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

{{-- @section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
  document.querySelector('.addImageInput').addEventListener('click', function() {
      var inputContainer = document.getElementById('imageInputs');

      var inputCount = inputContainer.children.length;

      var row = document.createElement('div');
      row.className = 'row image-row';

      var col1 = document.createElement('div');
      col1.className = 'col-11';

      var input = document.createElement('input');
      input.type = 'file';
      input.className = 'mt-3';
      input.name = 'photos[]';
      input.required = true;
      input.autocomplete = 'photos';

      col1.appendChild(input);

      var col2 = document.createElement('div');
      col2.className = 'col-1';

      if (inputCount > 0) {
          var removeButton = document.createElement('button');
          removeButton.type = 'button';
          removeButton.className = 'btn btn-warning removeImageInput';
          removeButton.style.borderRadius = '50%';
          removeButton.innerHTML = '<i class="fas fa-times"></i>';
          col2.appendChild(removeButton);
      }

      row.appendChild(col1);
      row.appendChild(col2);

      inputContainer.appendChild(row);
  });

  // Event delegation for dynamically added remove buttons
  document.getElementById('imageInputs').addEventListener('click', function(e) {
      console.log(e);
      if (e.target.classList.contains('removeImageInput') || e.target.closest('.removeImageInput')) {
          e.target.closest('.image-row').remove();
      }
  });
});
</script>
@endsection --}}

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.addImageInput').addEventListener('click', function() {
      var inputContainer = document.getElementById('imageInputs');

      var row = document.createElement('div');
      row.className = 'row image-row';

      var col1 = document.createElement('div');
      col1.className = 'col-6';

      var input = document.createElement('input');
      input.type = 'file';
      input.className = 'mt-3';
      input.name = 'images[]';
      input.required = true;
      input.autocomplete = 'off'; // disable autocomplete to prevent browser from auto-filling the file input

      col1.appendChild(input);

      var col2 = document.createElement('div');
      col2.className = 'col-6';

      var removeButton = document.createElement('button');
      removeButton.type = 'button';
      removeButton.className = 'btn btn-warning removeImageInput';
      removeButton.style.borderRadius = '50%'; // Adjust margin for better alignment
      removeButton.innerHTML = '<i class="fas fa-times"></i>';
      removeButton.addEventListener('click', function() {
        row.remove(); // Remove the entire row when remove button is clicked
      });

      col2.appendChild(removeButton);

      row.appendChild(col1);
      row.appendChild(col2);

      inputContainer.appendChild(row);
    });

    // Event delegation for dynamically added remove buttons
    document.getElementById('imageInputs').addEventListener('click', function(e) {
      if (e.target.classList.contains('removeImageInput')) {
        e.target.closest('.image-row').remove();
      }
    });
  });
</script>
@endsection