@extends('layouts.page')
@section('lab','active')
@section('white','text-white')
@section('link','Our Lab')
@section('head','Labortary')
@section('content')
    <!--Lab Section-->
    <div class="container" id="lab">
        <h2 class="text-center mt-5">Laboratory</h2>
        <div class="row mt-5">
            @forelse($projects as $project)
            <div class="col-sm-12 col-md-6 col-lg-3 mb-sm-3 mb-md-3 mb-lg-4" id="res-card">
                <div class="d-flex justify-content-center">
                    <div class="card mb-3" style="width: 23rem;">
                        <img class="card-img-top" src="{{asset('storage/projectimages/'.$project->image)}}" width="200" height="180" alt="Labortary Photos of Innovative Lab">
                        <div class="card-body">
                          <h6 class="card-title" style="font-size: 15px;">{{$project->name}}</h6>
                        </div>
                    </div>
                </div>     
            </div>
            @empty
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="text-center">No Lab Photos was found....</h5>
                </div>
            </div>
            @endforelse
            <!--pagination-->
            <div class="d-flex justify-content-center">
                {{$projects->links()}}
            </div>
            
            <!--End pagination-->
        </div>
    </div>
    <!--End Lab Section-->   
@endsection
