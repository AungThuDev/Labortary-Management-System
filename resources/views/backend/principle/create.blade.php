@extends('layouts.master')
@section('principle-active','nav-link active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Principle Create Form</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
                        <a href="{{route('admin.principles')}}" class="btn btn-outline-success"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <form action="{{route('admin.principles.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name"><i class="far fa-user-circle"></i>&nbsp;Principle Name</label>
                    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" autocomplete="name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="position"><i class="fas fa-user-tag"></i>&nbsp;Position</label>
                    <input id="position" type="text" name="position" class="form-control @error('position') is-invalid @enderror" autocomplete="position" value="{{ old('position') }}">
                    @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope-open"></i>&nbsp;Email</label>
                    <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" autocomplete="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone-alt"></i>&nbsp;Phone</label>
                    <input id="phone" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" autocomplete="phone" value="{{ old('phone') }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="about"><i class="fas fa-address-card"></i>&nbsp;About Principle</label>
                    <textarea name="about" id="about" cols="30" rows="10" class="form-control @error('about') is-invalid @enderror">{{ old('about') }}</textarea>
                    @error('about')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="qualification"><i class="fas fa-user-graduate"></i>&nbsp;Qualification</label>
                            <div class="col-md-12">
                                <div id="qualifiedInputs">
                                    <input type="text" class="form-control @error('qualifications.*') is-invalid @enderror" name="qualifications[]" autocomplete="qualifications" value="{{ old('qualifications.0') }}"><br>
                                    @error('qualifications.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-success addQualifiedInput"><i class="fas fa-plus-circle"></i>&nbsp;Add Qualification</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="experimentation"><i class="fab fa-researchgate"></i>&nbsp;Experimentation</label>
                            <div class="col-md-12">
                                <div id="experimentInputs">
                                    <input type="text" class="form-control @error('experimentations.*') is-invalid @enderror" name="experimentations[]" autocomplete="experimentations" value="{{ old('experimentations.0') }}"><br>
                                    @error('experimentations.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-success addExperimentInput"><i class="fas fa-plus-circle"></i>&nbsp;Add Experimentation</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="award"><i class="fas fa-award"></i>&nbsp;Awards</label>
                            <div class="col-md-12">
                                <div id="awardInputs">
                                    <input type="text" class="form-control @error('awards.*') is-invalid @enderror" name="awards[]" autocomplete="awards" value="{{ old('awards.0') }}"><br>
                                    @error('awards.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-success addAwardInput"><i class="fas fa-plus-circle"></i>&nbsp;Add Award</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="associations"><i class="fas fa-network-wired"></i>&nbsp;Associations</label>
                            <div class="col-md-12">
                                <div id="associateInputs">
                                    <input type="text" class="form-control @error('associations.*') is-invalid @enderror" name="associations[]" autocomplete="associations" value="{{ old('associations.0') }}"><br>
                                    @error('associations.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-success addAssociateInput"><i class="fas fa-plus-circle"></i>&nbsp;Add Association</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="services"><i class="fab fa-servicestack"></i>&nbsp;Services</label>
                            <div class="col-md-12">
                                <div id="serviceInputs">
                                    <input type="text" class="form-control @error('services.*') is-invalid @enderror" name="services[]" autocomplete="services" value="{{ old('services.0') }}"><br>
                                    @error('services.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-success addServiceInput"><i class="fas fa-plus-circle"></i>&nbsp;Add Service</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="talks"><i class="fas fa-file-powerpoint"></i>&nbsp;Invited Talks</label>
                            <div class="col-md-12">
                                <div id="talkInputs">
                                    <input type="text" class="form-control @error('talks.*') is-invalid @enderror" name="talks[]" autocomplete="services" value="{{ old('talks.0') }}"><br>
                                    @error('talks.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-success addTalkInput"><i class="fas fa-plus-circle"></i>&nbsp;Add Invited Talks</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image"><i class="fas fa-images"></i>&nbsp;Image</label><br>
                    <input id="image" type="file" name="image" class="">
                    @error('image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-center mb-5">
                    <button class="btn btn-outline-success"><i class="fas fa-user-plus"></i>&nbsp;Create New Principle</button>
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
    //Qualifications
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.addQualifiedInput').addEventListener('click', function() {
            var inputContainer = document.getElementById('qualifiedInputs');

            var inputCount = inputContainer.children.length;

            var row = document.createElement('div');
            row.className = 'row qualified-row';

            var col1 = document.createElement('div');
            col1.className = 'col-11';

            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control mb-3';
            input.name = 'qualifications[]';
            input.required = true;
            input.autocomplete = 'qualifications';

            col1.appendChild(input);

            var col2 = document.createElement('div');
            col2.className = 'col-1';

            if (inputCount > 0) {
                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-warning removeQualifiedInput';
                removeButton.style.borderRadius = '50%';
                removeButton.innerHTML = '<i class="fas fa-times"></i>';
                col2.appendChild(removeButton);
            }

            row.appendChild(col1);
            row.appendChild(col2);

            inputContainer.appendChild(row);
        });

        // Event delegation for dynamically added remove buttons
        document.getElementById('qualifiedInputs').addEventListener('click', function(e) {
            console.log(e);
            if (e.target.classList.contains('removeQualifiedInput') || e.target.closest('.removeQualifiedInput')) {
                e.target.closest('.qualified-row').remove();
            }
        });
    });
    //Experimentations
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.addExperimentInput').addEventListener('click', function() {
            var inputContainer = document.getElementById('experimentInputs');

            var inputCount = inputContainer.children.length;

            var row = document.createElement('div');
            row.className = 'row experiment-row';

            var col1 = document.createElement('div');
            col1.className = 'col-11';

            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control mb-3';
            input.name = 'experimentations[]';
            input.required = true;
            input.autocomplete = 'experimentations';

            col1.appendChild(input);

            var col2 = document.createElement('div');
            col2.className = 'col-1';

            if (inputCount > 0) {
                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-warning removeExperimentInput';
                removeButton.style.borderRadius = '50%';
                removeButton.innerHTML = '<i class="fas fa-times"></i>';
                col2.appendChild(removeButton);
            }

            row.appendChild(col1);
            row.appendChild(col2);

            inputContainer.appendChild(row);
        });

        // Event delegation for dynamically added remove buttons
        document.getElementById('experimentInputs').addEventListener('click', function(e) {
            console.log(e);
            if (e.target.classList.contains('removeExperimentInput') || e.target.closest('.removeExperimentInput')) {
                e.target.closest('.experiment-row').remove();
            }
        });
    });
    //Awards
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.addAwardInput').addEventListener('click', function() {
            var inputContainer = document.getElementById('awardInputs');

            var inputCount = inputContainer.children.length;

            var row = document.createElement('div');
            row.className = 'row award-row';

            var col1 = document.createElement('div');
            col1.className = 'col-11';

            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control mb-3';
            input.name = 'awards[]';
            input.required = true;
            input.autocomplete = 'awards';

            col1.appendChild(input);

            var col2 = document.createElement('div');
            col2.className = 'col-1';

            if (inputCount > 0) {
                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-warning removeAwardInput';
                removeButton.style.borderRadius = '50%';
                removeButton.innerHTML = '<i class="fas fa-times"></i>';
                col2.appendChild(removeButton);
            }

            row.appendChild(col1);
            row.appendChild(col2);

            inputContainer.appendChild(row);
        });

        // Event delegation for dynamically added remove buttons
        document.getElementById('awardInputs').addEventListener('click', function(e) {
            console.log(e);
            if (e.target.classList.contains('removeAwardInput') || e.target.closest('.removeAwardInput')) {
                e.target.closest('.award-row').remove();
            }
        });
    });
    //Associations
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.addAssociateInput').addEventListener('click', function() {
            var inputContainer = document.getElementById('associateInputs');

            var inputCount = inputContainer.children.length;

            var row = document.createElement('div');
            row.className = 'row associate-row';

            var col1 = document.createElement('div');
            col1.className = 'col-11';

            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control mb-3';
            input.name = 'associations[]';
            input.required = true;
            input.autocomplete = 'associations';

            col1.appendChild(input);

            var col2 = document.createElement('div');
            col2.className = 'col-1';

            if (inputCount > 0) {
                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-warning removeAssociateInput';
                removeButton.style.borderRadius = '50%';
                removeButton.innerHTML = '<i class="fas fa-times"></i>';
                col2.appendChild(removeButton);
            }

            row.appendChild(col1);
            row.appendChild(col2);

            inputContainer.appendChild(row);
        });

        // Event delegation for dynamically added remove buttons
        document.getElementById('associateInputs').addEventListener('click', function(e) {
            console.log(e);
            if (e.target.classList.contains('removeAssociateInput') || e.target.closest('.removeAssociateInput')) {
                e.target.closest('.associate-row').remove();
            }
        });
    });
    //Services
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.addServiceInput').addEventListener('click', function() {
            var inputContainer = document.getElementById('serviceInputs');

            var inputCount = inputContainer.children.length;

            var row = document.createElement('div');
            row.className = 'row service-row';

            var col1 = document.createElement('div');
            col1.className = 'col-11';

            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control mb-3';
            input.name = 'services[]';
            input.required = true;
            input.autocomplete = 'services';

            col1.appendChild(input);

            var col2 = document.createElement('div');
            col2.className = 'col-1';

            if (inputCount > 0) {
                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-warning removeServiceInput';
                removeButton.style.borderRadius = '50%';
                removeButton.innerHTML = '<i class="fas fa-times"></i>';
                col2.appendChild(removeButton);
            }

            row.appendChild(col1);
            row.appendChild(col2);

            inputContainer.appendChild(row);
        });

        // Event delegation for dynamically added remove buttons
        document.getElementById('serviceInputs').addEventListener('click', function(e) {
            console.log(e);
            if (e.target.classList.contains('removeServiceInput') || e.target.closest('.removeServiceInput')) {
                e.target.closest('.service-row').remove();
            }
        });
    });
    //Talks
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.addTalkInput').addEventListener('click', function() {
            var inputContainer = document.getElementById('talkInputs');

            var inputCount = inputContainer.children.length;

            var row = document.createElement('div');
            row.className = 'row talk-row';

            var col1 = document.createElement('div');
            col1.className = 'col-11';

            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control mb-3';
            input.name = 'talks[]';
            input.required = true;
            input.autocomplete = 'talks';

            col1.appendChild(input);

            var col2 = document.createElement('div');
            col2.className = 'col-1';

            if (inputCount > 0) {
                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-warning removeTalkInput';
                removeButton.style.borderRadius = '50%';
                removeButton.innerHTML = '<i class="fas fa-times"></i>';
                col2.appendChild(removeButton);
            }

            row.appendChild(col1);
            row.appendChild(col2);

            inputContainer.appendChild(row);
        });

        // Event delegation for dynamically added remove buttons
        document.getElementById('talkInputs').addEventListener('click', function(e) {
            console.log(e);
            if (e.target.classList.contains('removeTalkInput') || e.target.closest('.removeTalkInput')) {
                e.target.closest('.talk-row').remove();
            }
        });
    });
</script>
@endsection