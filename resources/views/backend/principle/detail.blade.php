@extends('layouts.master')
@section('principle-active','nav-link active')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 d-flex align-items-center">Principle Detail Imforamation</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
            <a href="{{route('admin.principles.edit',$principle->id)}}" class="btn btn-outline-success mx-3"><i class="fas fa-edit"></i>&nbsp;Edit</a>
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
    <div class="card mb-3" style="max-width: 1400px;border-radius:2rem;">
    <div class="row g-0">
        <div class="col-md-4">
        <img src="{{ asset('storage/principleimages/' . $principle->image) }}" width="350" height="900" style="margin-left:50px;margin-right:50px;margin-top:30px;margin-bottom:30px;border:2px solid black;" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title"><span style="font-weight: bold;">Name</span> : {{$principle->name}}</h5>
            <p class="card-text"><span style="font-weight: bold;">Position</span> : {{$principle->position}}</p>
            <p class="card-text"><span style="font-weight: bold;">Email</span> : {{$principle->email}}</p>
            <p class="card-text"><span style="font-weight: bold;">Phone</span> : {{$principle->phone}}</p>
            <h5>About</h5>
            
            <p style="text-align: justify;">{{$principle->about}}</p>
            <h5>Education</h5>
                @foreach($principle->qualifications as $qua)
                <p><i class="fas fa-graduation-cap"></i>&nbsp;{{$qua->description}}</p>
                @endforeach
            <h5>Research</h5>
              @foreach($principle->experimentations as $ex)
              <p><i class="fab fa-researchgate"></i>&nbsp;{{$ex->description}}</p>    
              @endforeach
            <h5>Awards</h5>
              @foreach($principle->awards as $a)
              <p><i class="fas fa-award"></i>&nbsp;{{$a->description}}</p>    
              @endforeach
            <h5>Associations</h5>
              @foreach($principle->associations as $a)
              <p><i class="fas fa-users"></i>&nbsp;{{$a->description}}</p>    
              @endforeach
            <h5>Services</h5>
              @foreach($principle->services as $a)
              <p><i class="fab fa-servicestack"></i>&nbsp;{{$a->description}}</p>    
              @endforeach
            <h5>Invited Talks</h5>
              @foreach($principle->talks as $a)
              <p><i class="fas fa-file-powerpoint"></i>&nbsp;{{$a->description}}</p>    
              @endforeach
        </div>
        </div>
    </div>
    </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

