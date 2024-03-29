@extends('layouts.page')
@section('research','active')
@section('white','text-white')
@section('link','Researches')
@section('head','Researches')
@section('content')
    <!--Research Section-->
    <div class="profile-area">
        <div class="container">
            <div class="row mt-5">
                <div class="col-2">
                    <a href="{{route('research')}}" class="btn btn-outline-primary" style="border-radius: 50%;"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="col-8">
                    <form action="{{route('search-research')}}" class="form-inline" method="GET">

                        <div class="input-group mb-2 mr-sm-2">

                            <input type="text" class="form-control" id="search" name="search"
                                placeholder="search Subjects...">
                            <div class="input-group-prepend">
                                <!-- <div class="input-group-text">@</div> -->
                                <button class="btn btn-success"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-2"></div>
            </div>
            
            <div class="col-10 mx-auto">
                <h2>Researches</h2>
            </div>
            
            <div class="row mb-3">
                @forelse($researches as $research)
                <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                    <div class="card">
                        <div class="img1"><img src="{{asset('storage/research/'.$research->image)}}" alt="Research Photos of Innovative Lab"></div>
                        <div class="img2"><img src="{{asset('storage/memberimages/'.$research->member->image)}}" alt="Member Photos of Innovative Lab"></div>
                        <div class="main-text">
                            <h3>{{$research->name}}</h3>
                            <p>Candidate : {{$research->member->name}}</p>
                        </div>
                        <div class="socials">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-linkedin"></i>
                            <i class="fa fa-dribbble"></i>
                            <i class="fa fa-twitter"></i>
                        </div>
                    </div>
                </div><br><br>
                
                @empty
                <div class="col-lg-12">
                    <h5 class="text-center">No Research data found....</h5>
                </div>
                @endforelse
            </div>
            
            
        </div>
    </div>
    <!--End Research Section-->
@endsection