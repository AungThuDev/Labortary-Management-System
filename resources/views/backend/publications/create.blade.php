@extends('layouts.master')
@section('publication-active','nav-link active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 d-flex align-items-center">Create Publication Form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
              <a href="{{route('admin.publications')}}" class="btn btn-outline-success"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
            
            <form action="{{route('admin.publications.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
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
                <label for="name_link"><i class="far fa-user-circle"></i>&nbsp;NameLink</label>
                <input id="name_link" type="text" name="name_link" class="form-control @error('name_link') is-invalid @enderror" autocomplete="name_link" value="{{old('name_link')}}">
                @error('name_link')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="journal"><i class="fas fa-graduation-cap"></i>&nbsp;Journal</label>
                <input id="journal" type="text" name="journal" class="form-control @error('journal') is-invalid @enderror" autocomplete="journal" value="{{old('journal')}}">
                @error('journal')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="journal_link"><i class="fas fa-graduation-cap"></i>&nbsp;JournalLink</label>
                <input id="journal_link" type="text" name="journal_link" class="form-control @error('journal_link') is-invalid @enderror" autocomplete="journal_link" value="{{old('journal_link')}}">
                @error('journal_link')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-6">
                  <div class="form-group">
                      <label for="author_name"><i class="fas fa-user-graduate"></i>&nbsp;AuthorName</label>
                      <div class="col-md-12">
                          <div id="authorInputs">
                              <input type="text" class="form-control @error('author_name.*') is-invalid @enderror" name="author_name[]" autocomplete="author_name" value="{{ old('author_name.0') }}"><br>
                              @error('author_name.*')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <button type="button" class="btn btn-success addAuthorInput"><i class="fas fa-plus-circle"></i>&nbsp;Add AuthorName</button>
                      </div>
                  </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                    <label for="author_link"><i class="fas fa-user-graduate"></i>&nbsp;AuthorLink</label>
                    <div class="col-md-12">
                        <div id="linkInputs">
                            <input type="text" class="form-control @error('author_link.*') is-invalid @enderror" name="author_link[]" autocomplete="author_link" value="{{ old('author_link.0') }}"><br>
                            @error('author_link.*')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="button" class="btn btn-success addLinkInput"><i class="fas fa-plus-circle"></i>&nbsp;Add AuthorLink</button>
                    </div>
                </div>
            </div>
                
            </div>
            <div class="d-flex justify-content-center mb-5">
                <button class="btn btn-outline-success"><i class="fas fa-user-plus"></i>&nbsp;Create New Publication</button>
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

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.addAuthorInput').addEventListener('click', function() {
            var inputContainer = document.getElementById('authorInputs');

            var inputCount = inputContainer.children.length;

            var row = document.createElement('div');
            row.className = 'row qualified-row';

            var col1 = document.createElement('div');
            col1.className = 'col-11';

            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control mb-3';
            input.name = 'author_name[]';
            input.required = true;
            input.autocomplete = 'author_name';

            col1.appendChild(input);

            var col2 = document.createElement('div');
            col2.className = 'col-1';

            if (inputCount > 0) {
                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-warning removeAuthorInput';
                removeButton.style.borderRadius = '50%';
                removeButton.innerHTML = '<i class="fas fa-times"></i>';
                col2.appendChild(removeButton);
            }

            row.appendChild(col1);
            row.appendChild(col2);

            inputContainer.appendChild(row);
        });

        // Event delegation for dynamically added remove buttons
        document.getElementById('authorInputs').addEventListener('click', function(e) {
            console.log(e);
            if (e.target.classList.contains('removeAuthorInput') || e.target.closest('.removeAuthorInput')) {
                e.target.closest('.qualified-row').remove();
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.addLinkInput').addEventListener('click', function() {
            var inputContainer = document.getElementById('linkInputs');

            var inputCount = inputContainer.children.length;

            var row = document.createElement('div');
            row.className = 'row qualified-row';

            var col1 = document.createElement('div');
            col1.className = 'col-11';

            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control mb-3';
            input.name = 'author_link[]';
            input.required = true;
            input.autocomplete = 'author_link';

            col1.appendChild(input);

            var col2 = document.createElement('div');
            col2.className = 'col-1';

            if (inputCount > 0) {
                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-warning removeLinkInput';
                removeButton.style.borderRadius = '50%';
                removeButton.innerHTML = '<i class="fas fa-times"></i>';
                col2.appendChild(removeButton);
            }

            row.appendChild(col1);
            row.appendChild(col2);

            inputContainer.appendChild(row);
        });

        // Event delegation for dynamically added remove buttons
        document.getElementById('linkInputs').addEventListener('click', function(e) {
            console.log(e);
            if (e.target.classList.contains('removeLinkInput') || e.target.closest('.removeLinkInput')) {
                e.target.closest('.qualified-row').remove();
            }
        });
    });

        // document.getElementById('addLinkInput').addEventListener('click',function(){
        //     var input = document.createElement('input');
        //     input.type = 'text';
        //     input.className = 'form-control';
        //     input.name = 'author_link[]';
        //     input.required = true;
        //     input.autocomplete = 'author_link';

        //     document.getElementById('linkInputs').appendChild(input);
        // });
    </script>
@endsection