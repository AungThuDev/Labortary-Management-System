@extends('layouts.master')
@section('principle-active','nav-link active')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Principle Form</h1>
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
            <form action="{{route('admin.principles.update',$principle->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name"><i class="far fa-user-circle"></i>&nbsp;Principle Name</label>
                    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" autocomplete="name" value="{{$principle->name}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="position"><i class="fas fa-user-tag"></i>&nbsp;Position</label>
                    <input id="position" type="text" name="position" class="form-control @error('position') is-invalid @enderror" autocomplete="position" value="{{$principle->position}}">
                    @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope-open"></i>&nbsp;Email</label>
                    <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" autocomplete="email" value="{{$principle->email}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone-alt"></i>&nbsp;Phone</label>
                    <input id="phone" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" autocomplete="phone" value="{{$principle->phone}}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="about"><i class="fas fa-address-card"></i>&nbsp;About Principle</label>
                    <textarea name="about" id="about" cols="30" rows="10" class="form-control">{{$principle->about}}</textarea>
                    @error('about')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="qualifications"><i class="fas fa-user-graduate"></i>&nbsp;Qualification</label>
                        <div class="col-md-12">
                            <div id="qualifiedInputs">
                                @foreach($principle->qualifications as $key => $res)
                                <div class="qualified-input mb-3">
                                    <div class="row">
                                        <div class="col-11">
                                            <input type="text" class="form-control @error('qualifications.*') is-invalid @enderror" name="qualifications[]" autocomplete="qualifications" value="{{$res->description}}">
                                        </div>
                                        <div class="col-1">
                                            @if ($key > 0)
                                            <button type="button" class="btn btn-warning removeQualifiedInput" style="border-radius: 50%;"><i class="fas fa-times"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @error('qualifications.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="button" id="addQualifiedInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Add Qualification</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="Experimentations"><i class="fab fa-researchgate"></i>&nbsp;Experimentations</label>
                        <div class="col-md-12">
                            <div id="experimentInputs">
                                @foreach($principle->experimentations as $key => $res)
                                <div class="experiment-input mb-3">
                                    <div class="row">
                                        <div class="col-11">
                                            <input type="text" class="form-control @error('experimentations.*') is-invalid @enderror" name="experimentations[]" autocomplete="experimentations" value="{{$res->description}}">
                                        </div>
                                        <div class="col-1">
                                            @if ($key > 0)
                                            <button type="button" class="btn btn-warning removeExperimentInput" style="border-radius: 50%;"><i class="fas fa-times"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @error('experimentations.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="button" id="addExperimentInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Add Experimentation</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="awards"><i class="fas fa-award"></i>&nbsp;Awards</label>
                        <div class="col-md-12">
                            <div id="awardInputs">
                                @foreach($principle->awards as $key => $res)
                                <div class="award-input mb-3">
                                    <div class="row">
                                        <div class="col-11">
                                            <input type="text" class="form-control @error('awards.*') is-invalid @enderror" name="awards[]" autocomplete="awards" value="{{$res->description}}">
                                        </div>
                                        <div class="col-1">
                                            @if ($key > 0)
                                            <button type="button" class="btn btn-warning removeAwardInput" style="border-radius: 50%;"><i class="fas fa-times"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @error('awards.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="button" id="addAwardInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Add Award</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="Associations"><i class="fas fa-sitemap"></i>&nbsp;Associations</label>
                        <div class="col-md-12">
                            <div id="associateInputs">
                                @foreach($principle->associations as $key => $res)
                                <div class="associate-input mb-3">
                                    <div class="row">
                                        <div class="col-11">
                                            <input type="text" class="form-control @error('associations.*') is-invalid @enderror" name="associations[]" autocomplete="associations" value="{{$res->description}}">
                                        </div>
                                        <div class="col-1">
                                            @if ($key > 0)
                                            <button type="button" class="btn btn-warning removeAssociateInput" style="border-radius: 50%;"><i class="fas fa-times"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @error('associations.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="button" id="addAssociateInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Add Association</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="Services"><i class="fab fa-servicestack"></i>&nbsp;Services</label>
                        <div class="col-md-12">
                            <div id="serviceInputs">
                                @foreach($principle->services as $key => $res)
                                <div class="service-input mb-3">
                                    <div class="row">
                                        <div class="col-11">
                                            <input type="text" class="form-control @error('services.*') is-invalid @enderror" name="services[]" autocomplete="services" value="{{$res->description}}">
                                        </div>
                                        <div class="col-1">
                                            @if ($key > 0)
                                            <button type="button" class="btn btn-warning removeServiceInput" style="border-radius: 50%;"><i class="fas fa-times"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @error('services.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="button" id="addServiceInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Add Service</button>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="talks"><i class="fas fa-file-powerpoint"></i>&nbsp;Invited Talks</label>
                        <div class="col-md-12">
                            <div id="talkInputs">
                                @foreach($principle->talks as $key => $res)
                                <div class="talk-input mb-3">
                                    <div class="row">
                                        <div class="col-11">
                                            <input type="text" class="form-control @error('talks.*') is-invalid @enderror" name="talks[]" autocomplete="talks" value="{{$res->description}}">
                                        </div>
                                        <div class="col-1">
                                            @if ($key > 0)
                                            <button type="button" class="btn btn-warning removeTalkInput" style="border-radius: 50%;"><i class="fas fa-times"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @error('talks.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="button" id="addTalkInput" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Add Invited Talk</button>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label for="image"><i class="fas fa-images"></i>&nbsp;Image</label><br>
                    <img src="{{ asset('storage/principleimages/' . $principle->image) }}" alt="Project Image" width="200" height="200"><br><br>
                    <input id="image" type="file" name="image" class="">
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
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
    //for Qualifications
    document.getElementById('addQualifiedInput').addEventListener('click', function() {
        var inputContainer = document.getElementById('qualifiedInputs');
        var inputCount = inputContainer.children.length;

        var div = document.createElement('div');
        div.className = 'qualified-input mb-3';

        var row = document.createElement('div');
        row.className = 'row';

        var col1 = document.createElement('div');
        col1.className = 'col-11';

        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.name = 'qualifications[]';
        input.required = true;
        input.autocomplete = 'qualifications';

        col1.appendChild(input);

        var col2 = document.createElement('div');
        col2.className = 'col-1';

        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-warning removeQualifiedInput' + (inputCount > 0 ? '' : ' d-none'); // Hide the "X" button for the first input field
        removeButton.style.borderRadius = '50%';
        removeButton.innerHTML = '<i class="fas fa-times"></i>';

        col2.appendChild(removeButton);
        row.appendChild(col1);
        row.appendChild(col2);
        div.appendChild(row);

        inputContainer.appendChild(div);
    });
    // Event delegation for dynamically added remove buttons
    document.getElementById('qualifiedInputs').addEventListener('click', function(e) {
        if (e.target.classList.contains('removeQualifiedInput') || e.target.closest('.removeQualifiedInput')) {
            e.target.closest('.qualified-input').remove();
        }
    });

    //for Experimentations
    document.getElementById('addExperimentInput').addEventListener('click', function() {
        var inputContainer = document.getElementById('experimentInputs');
        var inputCount = inputContainer.children.length;

        var div = document.createElement('div');
        div.className = 'experiment-input mb-3';

        var row = document.createElement('div');
        row.className = 'row';

        var col1 = document.createElement('div');
        col1.className = 'col-11';

        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.name = 'experimentations[]';
        input.required = true;
        input.autocomplete = 'experimentations';

        col1.appendChild(input);

        var col2 = document.createElement('div');
        col2.className = 'col-1';

        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-warning removeExperimentInput' + (inputCount > 0 ? '' : ' d-none'); // Hide the "X" button for the first input field
        removeButton.style.borderRadius = '50%';
        removeButton.innerHTML = '<i class="fas fa-times"></i>';

        col2.appendChild(removeButton);
        row.appendChild(col1);
        row.appendChild(col2);
        div.appendChild(row);

        inputContainer.appendChild(div);
    });
    // Event delegation for dynamically added remove buttons
    document.getElementById('experimentInputs').addEventListener('click', function(e) {
        if (e.target.classList.contains('removeExperimentInput') || e.target.closest('.removeExperimentInput')) {
            e.target.closest('.experiment-input').remove();
        }
    });

    //For Awards
    document.getElementById('addAwardInput').addEventListener('click', function() {
        var inputContainer = document.getElementById('awardInputs');
        var inputCount = inputContainer.children.length;

        var div = document.createElement('div');
        div.className = 'award-input mb-3';

        var row = document.createElement('div');
        row.className = 'row';

        var col1 = document.createElement('div');
        col1.className = 'col-11';

        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.name = 'awards[]';
        input.required = true;
        input.autocomplete = 'awards';

        col1.appendChild(input);

        var col2 = document.createElement('div');
        col2.className = 'col-1';

        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-warning removeAwardInput' + (inputCount > 0 ? '' : ' d-none'); // Hide the "X" button for the first input field
        removeButton.style.borderRadius = '50%';
        removeButton.innerHTML = '<i class="fas fa-times"></i>';

        col2.appendChild(removeButton);
        row.appendChild(col1);
        row.appendChild(col2);
        div.appendChild(row);

        inputContainer.appendChild(div);
    });
    // Event delegation for dynamically added remove buttons
    document.getElementById('awardInputs').addEventListener('click', function(e) {
        if (e.target.classList.contains('removeAwardInput') || e.target.closest('.removeAwardInput')) {
            e.target.closest('.award-input').remove();
        }
    });

    //For Associations
    document.getElementById('addAssociateInput').addEventListener('click', function() {
        var inputContainer = document.getElementById('associateInputs');
        var inputCount = inputContainer.children.length;

        var div = document.createElement('div');
        div.className = 'associate-input mb-3';

        var row = document.createElement('div');
        row.className = 'row';

        var col1 = document.createElement('div');
        col1.className = 'col-11';

        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.name = 'associations[]';
        input.required = true;
        input.autocomplete = 'associations';

        col1.appendChild(input);

        var col2 = document.createElement('div');
        col2.className = 'col-1';

        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-warning removeAssociateInput' + (inputCount > 0 ? '' : ' d-none'); // Hide the "X" button for the first input field
        removeButton.style.borderRadius = '50%';
        removeButton.innerHTML = '<i class="fas fa-times"></i>';

        col2.appendChild(removeButton);
        row.appendChild(col1);
        row.appendChild(col2);
        div.appendChild(row);

        inputContainer.appendChild(div);
    });
    // Event delegation for dynamically added remove buttons
    document.getElementById('associateInputs').addEventListener('click', function(e) {
        if (e.target.classList.contains('removeAssociateInput') || e.target.closest('.removeAssociateInput')) {
            e.target.closest('.associate-input').remove();
        }
    });


    //For Service
    document.getElementById('addServiceInput').addEventListener('click', function() {
        var inputContainer = document.getElementById('serviceInputs');
        var inputCount = inputContainer.children.length;

        var div = document.createElement('div');
        div.className = 'service-input mb-3';

        var row = document.createElement('div');
        row.className = 'row';

        var col1 = document.createElement('div');
        col1.className = 'col-11';

        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.name = 'services[]';
        input.required = true;
        input.autocomplete = 'services';

        col1.appendChild(input);

        var col2 = document.createElement('div');
        col2.className = 'col-1';

        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-warning removeServiceInput' + (inputCount > 0 ? '' : ' d-none'); // Hide the "X" button for the first input field
        removeButton.style.borderRadius = '50%';
        removeButton.innerHTML = '<i class="fas fa-times"></i>';

        col2.appendChild(removeButton);
        row.appendChild(col1);
        row.appendChild(col2);
        div.appendChild(row);

        inputContainer.appendChild(div);
    });
    // Event delegation for dynamically added remove buttons
    document.getElementById('serviceInputs').addEventListener('click', function(e) {
        if (e.target.classList.contains('removeSercviceInput') || e.target.closest('.removeServiceInput')) {
            e.target.closest('.service-input').remove();
        }
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

    document.getElementById('addTalkInput').addEventListener('click', function() {
        var inputContainer = document.getElementById('talkInputs');
        var inputCount = inputContainer.children.length;

        var div = document.createElement('div');
        div.className = 'talk-input mb-3';

        var row = document.createElement('div');
        row.className = 'row';

        var col1 = document.createElement('div');
        col1.className = 'col-11';

        var input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.name = 'talks[]';
        input.required = true;
        input.autocomplete = 'talks';

        col1.appendChild(input);

        var col2 = document.createElement('div');
        col2.className = 'col-1';

        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'btn btn-warning removeTalkInput' + (inputCount > 0 ? '' : ' d-none'); // Hide the "X" button for the first input field
        removeButton.style.borderRadius = '50%';
        removeButton.innerHTML = '<i class="fas fa-times"></i>';

        col2.appendChild(removeButton);
        row.appendChild(col1);
        row.appendChild(col2);
        div.appendChild(row);

        inputContainer.appendChild(div);
    });
    // Event delegation for dynamically added remove buttons
    document.getElementById('talkInputs').addEventListener('click', function(e) {
        if (e.target.classList.contains('removeTalkInput') || e.target.closest('.removeTalkInput')) {
            e.target.closest('.talk-input').remove();
        }
    });
</script>
@endsection