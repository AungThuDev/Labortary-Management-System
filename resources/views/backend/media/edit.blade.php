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
                <label for="image"><i class="fas fa-images"></i>&nbsp;Cover Image</label><br>
                <img src="{{ asset('storage/newsimages/' . $media->image) }}" alt="News Image" width="200" height="130"><br><br>
                <input type="file" name="image" class="">
                @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="col-md-6">
              <label for="images"><i class="fas fa-images"></i>&nbsp;&nbsp;Images</label>
              <div class="col-md-12">
                  <div id="imageInputs">
                      @foreach($media->images as $key => $res)
                      
                      <div class="image-input mb-3">
                        <img src="{{asset('storage/newsimages/'.$res->photo)}}" alt="Images" width="200" height="130"><br><br>
                        <div id="newform"></div>
                          <div class="row">
                              <div class="col-6">
  
                                  <input type="file" class="@error('images.*') is-invalid @enderror" name="{{$res->id}}" autocomplete="images">
                              </div>
                              <div class="col-6">
                                  @if ($key > 0)
                                  <button type="button" id="{{$res->id}}" onclick="removeImage(event)" class="btn btn-warning removeImageInput" style="border-radius: 50%;"><i class="fas fa-times"></i></button>
                                  @endif
                              </div>
                          </div>
                      </div>
                      @endforeach
                      @error('images.*')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                  <button type="button" id="addImageInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;AddNewImage</button>
              </div>
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
@section('scripts')
<script>
  document.getElementById('addImageInput').addEventListener('click', function() {
        var inputContainer = document.getElementById('imageInputs');
        var inputCount = inputContainer.children.length;

        var div = document.createElement('div');
        div.className = 'image-input mb-3';

        var row = document.createElement('div');
        row.className = 'row';

        var col1 = document.createElement('div');
        col1.className = 'col-6';

        var input = document.createElement('input');
        input.type = 'file';
        input.className = 'form-control';
        input.name = 'images[]';
        input.required = true;
        input.autocomplete = 'images';

        col1.appendChild(input);

        var col2 = document.createElement('div');
        col2.className = 'col-6';

        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-warning removeImageInput' + (inputCount > 0 ? '' : ' d-none'); // Hide the "X" button for the first input field
        removeButton.style.borderRadius = '50%';
        removeButton.innerHTML = '<i class="fas fa-times"></i>';

        col2.appendChild(removeButton);
        row.appendChild(col1);
        row.appendChild(col2);
        div.appendChild(row);

        inputContainer.appendChild(div);
    });
    // Event delegation for dynamically added remove buttons
    document.getElementById('imageInputs').addEventListener('click', function(e) {
      
        if (e.target.classList.contains('removeImageInput') || e.target.closest('.removeImageInput')) {
            e.target.closest('.image-input').remove();
        }
        
    });

    function removeImage(event) {
      console.log(event.currentTarget.id);
      var newform = document.getElementById('newform');
        console.log(newform);
        var form = document.createElement('input');
        newform.appendChild(form);
        form.type = "hidden";
        form.name = "deleted_images[]";
        form.value = event.currentTarget.id;
    }
</script>
@endsection
