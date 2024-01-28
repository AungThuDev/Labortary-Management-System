@extends('layouts.page')
@section('member','active')
@section('white','text-white')
@section('link','Members')
@section('head','Active Members')
@section('content')
    <!--Current Members Section-->
    <section class="members">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Active Members</h2>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                @forelse($members as $member)
                                <div class="col-lg-4 col-md-6 col-sm-12 card-advisor">
                                    <div class="card img-card" style="height:100%">
                                        <img src="{{asset('storage/memberimages/'.$member->image)}}" class="card-img-top img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title" style="text-align: center;font-size:20px;"><a href="">
                                                    {{$member->name}}</a></h5>
                                            <p class="card-text" style="font-size: 14px;text-align: center;">Position :
                                                {{$member->position}}</p>
                                            <p class="card-text" style="text-align: center;font-weight: 900;">Related Research</p>
                                            <div style="margin-left:-50px;">
                                            <ul style="list-style: none;"> 
                                                @foreach($member->research as $research)
                                                <li>{{$research->name}}</li>
                                                @endforeach
                                            </ul>
                                            
                                            </div>
                                            
                                        </div>
                                        <a href="{{route('member-detail',$member->id)}}" class="w-80 btn btn-primary">Details</a>
                                        
                                    </div>
                                    
                                </div>
                                @empty
                                <div class="col-lg-12">
                                    <h5 class="text-center">No Members data found....</h5>
                                </div>
                                @endforelse
                            </div>
                            <!--pagination-->
                            {{$members->links()}}
                            <!--End pagination-->
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="container">
                                        <div class="card p-4">
                                            <div class="text">
                                                <h6>Search Here</h6>
                                                <hr>
                                            </div>
                                            <form action="{{route('search-active')}}" class="form-inline" method="GET">

                                                <div class="input-group mb-2 mr-sm-2">

                                                    <input type="text" class="form-control" id="search" name="search"
                                                        id="inlineFormInputGroupUsername2" placeholder="search...">
                                                    <div class="input-group-prepend">
                                                        <!-- <div class="input-group-text">@</div> -->
                                                        <button class="btn btn-success"><i
                                                                class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="container">
                                        <div class="card p-4">
                                            <div class="text">
                                                <h6><a href="{{route('former-members')}}" style="font-size: 20px;">Former Members</a></h6>
                                                <hr>
                                            </div>
                                            @forelse($formermembers as $member)
                                            <div class="row">
                                                
                                                <div class="col-4">
                                                    <img src="{{asset('storage/memberimages/'.$member->image)}}" width="60" height="70"
                                                        alt="former-members">
                                                </div>
                                                <div class="col-8">
                                                    <h6>{{$member->name}}</h6>
                                                    <p style="font-size: 10px;color: #21262b;font-weight: 900;">{{$member->position}}</p>
                                                    <p
                                                        style="font-size: 10px;color: #21262b;font-weight: 900;margin-top: -10px;">
                                                        Material Science</p>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h6>No FormmerMembers data was found...</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!--End Current Members Section-->
@endsection
