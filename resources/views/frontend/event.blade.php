@extends('layouts.page')
@section('event','active')
@section('white','text-white')
@section('link','Events')
@section('head','Events')
@section('content')
<!--Events Section-->
<section class="event">
    <div class="container">
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="{{route('search-event')}}" class="form-inline" method="GET">

                    <div class="input-group mb-2 mr-sm-2">

                        <input type="text" class="form-control" id="search" name="search" placeholder="search Events...">
                        <div class="input-group-prepend">
                            <!-- <div class="input-group-text">@</div> -->
                            <button class="btn btn-success"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row" id="news">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="row mb-3">
                    @forelse($events as $event)
                    <div class="col-lg-12">
                        <div class="card mt-5" style="width: 100%">
                            <img src="{{asset('storage/newsimages/'.$event->image)}}" class="card-img-top" height="100%" alt="...">
                            <div class="card-body">
                                <p class="card-text"><i class="fas fa-calendar-week"></i>&nbsp;{{$event->created_at}}
                                </p>
                                <h5 class="card-title">{{$event->title}}</h5>
                                <p class="card-text">
                                    @php
                                    echo substr($event->description,0,300)
                                    @endphp.......</p>
                                <a href="{{route('detail',$event->id)}}" class="btn btn-primary"><i class="fas fa-arrow-right"></i>&nbsp;Detail</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-12">
                        <h5 class="text-center">No Event was found...</h5>
                    </div>
                    @endforelse
                </div>
                <!--pagination-->
                <div class="d-flex justify-content-center">
                    {{$events->links()}}
                </div>
                    
                <!--End pagination-->
            </div>
            <div class="col-lg-4 mt-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="card p-4">
                                <div class="text">
                                    <h6>Featured Events</h6>
                                    <hr>
                                </div>
                                @forelse($medias as $media)
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{asset('storage/newsimages/'.$media->image)}}" width="80" height="60" alt="popular-news">
                                    </div>
                                    <div class="col-8">
                                        <h6>{{$media->title}}</h6>
                                        <p class="card-text" style="font-size: 11px;"><i class="fas fa-calendar-week"></i>&nbsp;{{$media->created_at}}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                @empty
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6>No Popular Event was found....</h6>
                                    </div>
                                </div>

                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Events Section-->
@endsection