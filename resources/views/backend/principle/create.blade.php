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
                            <label for="qualification"><i class="fas fa-graduation-cap"></i>&nbsp;Qualifications</label>

                            <div id="qualifiedInputs">
                                <input id="qualifications[0]" type="text" class="form-control @error('qualifications.*') is-invalid @enderror" name="qualifications[]" autocomplete="qualifications" value="{{ old('qualifications.0') }}"><br>
                                @error('qualifications.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <button type="button" id="addQualifiedInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Add Qualification</button>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Experimentations"><i class="fab fa-researchgate"></i>&nbsp;Experimentations</label>

                            <div id="experimentInputs">
                                <input id="experimentations[0]" type="text" class="form-control @error('experimentations.*') is-invalid @enderror" name="experimentations[]" autocomplete="experimentations" value="{{ old('experimentations.0') }}"><br>
                                @error('experimentations.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="button" id="addExperimentInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Add Experimentations</button>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="awards"><i class="fas fa-award"></i>&nbsp;Awards</label>

                            <div id="awardInputs">
                                <input id="awards[0]" type="text" class="form-control @error('awards.*') is-invalid @enderror" name="awards[]" autocomplete="awards" value="{{ old('awards.0') }}"><br>
                                @error('awards.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="button" id="addAwardInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Add Awards</button>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="associations"><i class="fas fa-sitemap"></i>&nbsp;Associations</label>

                            <div id="associationInputs">
                                <input id="associations[0]" type="text" class="form-control @error('associations.*') is-invalid @enderror" name="associations[]" autocomplete="associations" value="{{ old('associations.0') }}"><br>
                                @error('associations.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="button" id="addAssociationInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Add Associations</button>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="services"><i class="fab fa-servicestack"></i>&nbsp;Services</label>

                            <div id="serviceInputs">
                                <input id="services[0]" type="text" class="form-control @error('services.*') is-invalid @enderror" name="services[]" autocomplete="services" value="{{ old('services.0') }}"><br>
                                @error('services.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="button" id="addServiceInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Add Services</button>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="talks"><i class="fas fa-tasks"></i>&nbsp;Invited Talks</label>

                            <div id="taklInputs">
                                <input id="talks[0]" type="text" class="form-control @error('talks.*') is-invalid @enderror" name="talks[]" autocomplete="talks" value="{{ old('talks.0') }}"><br>
                                @error('talks.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="button" id="addTalkInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;AddInvitedTalks</button>

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
    
    document.getElementById('addQualifiedInput').addEventListener('click', function() {
        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.name = 'qualifications[]';
        input.required = true;
        input.autocomplete = 'qualifications';
        document.getElementById('qualifiedInputs').appendChild(input);
    });

    document.getElementById('addExperimentInput').addEventListener('click', function() {
        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.name = 'experimentations[]';
        input.required = true;
        input.autocomplete = 'experimentations';
        document.getElementById('experimentInputs').appendChild(input);
    });

    document.getElementById('addAwardInput').addEventListener('click', function() {
        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.name = 'awards[]';
        input.required = true;
        input.autocomplete = 'awards';
        document.getElementById('awardInputs').appendChild(input);
    });

    document.getElementById('addAssociationInput').addEventListener('click', function() {
        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.name = 'associations[]';
        // input.required = true;
        input.autocomplete = 'associations';
        document.getElementById('associationInputs').appendChild(input);
    });

    document.getElementById('addServiceInput').addEventListener('click', function() {
        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.name = 'services[]';
        // input.required = true;
        input.autocomplete = 'services';
        document.getElementById('serviceInputs').appendChild(input);
    });

    document.getElementById('addTalkInput').addEventListener('click', function() {
        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.name = 'talks[]';
        // input.required = true;
        input.autocomplete = 'talks';

        document.getElementById('taklInputs').appendChild(input);
    });
</script>
@endsection