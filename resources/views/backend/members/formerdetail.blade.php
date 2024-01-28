@extends('layouts.master')
@section('member-active','nav-link active')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 d-flex align-items-center">Former Member Detail Imforamation</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
            <a href="{{route('admin.former_members')}}" class="btn btn-outline-success"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
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
        <img src="{{ asset('storage/memberimages/' . $member->image) }}" width="300" height="300" style="margin-left:100px;margin-right:100px;margin-top:30px;margin-bottom:30px;border:2px solid black;" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title"><span style="font-weight: bold;">Name</span> : {{$member->name}}</h5>
            <p class="card-text"><span style="font-weight: bold;">Position</span> : {{$member->position}}</p>
            <h5>Education</h5>
            @foreach($member->memberedu as $education)
                <p><i class="fas fa-graduation-cap"></i>&nbsp;{{$education->description}}</p>
            @endforeach
            <h5>Research</h5>
            @foreach($member->research as $research)
              <p><i class="fab fa-researchgate"></i>&nbsp;{{$research->name}}</p>
            @endforeach
            <p class="card-text" style="text-align: justify;">{!! nl2br($member->about) !!}</p>
            <h5>Social Meida Links</h5>
            <p><i class="fab fa-facebook-square"></i>&nbsp;&nbsp;Facebook</p>
            <a href="{{$member->facebook}}"><p class="card-text">{{$member->facebook}}</p></a><br>
            <p><i class="fab fa-instagram-square"></i>&nbsp;&nbsp;Instagram</p>
            <a href="{{$member->instagram}}"><p class="card-text">{{$member->instagram}}</p></a><br>
            <p><i class="fab fa-twitter-square"></i>&nbsp;&nbsp;Twitter</p>
            <a href="{{$member->twitter}}"><p class="card-text">{{$member->twitter}}</p></a><br>
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

