@extends('layouts.page')
@section('event','active')
@section('white','text-white')
@section('link','Events')
@section('head','Event Detail')
@section('content')
<!--Events Section-->
<section class="event">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-5">
                            <img src="{{asset('storage/newsimages/'.$event->image)}}" class="card-img-top" height="100%" alt="Event Photos of Innovative Lab">
                                
                                    <div class="row mt-4" style="margin:auto;"> 
                                        <div class="col-4 d-none d-md-flex d-lg-flex flex-md-row flex-lg-row gap-4" class="image-column">
                                            @foreach($event->images as $image)
                                                <img src="{{asset('storage/newsimages/'.$image->photo)}}" width="100%" alt="" class="mt-3 images-fluid">
                                            @endforeach
                                        </div>
                                    </div>
                                
                                
                            
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="card-text"><i class="fas fa-calendar-week"></i>&nbsp;{{ \Carbon\Carbon::parse($event->date)->diffForHumans()}}
                                    
                                </div>
                                </p>
                                <h5 class="card-title">{{$event->title}}</h5>
                                <p class="card-text detail">{!!nl2br($event->description)!!}</p>
                                <!-- <a href="" class="btn btn-primary primary" id="back-btn"><i class="fas fa-arrow-left"></i>&nbsp;Back</a> -->
                                <h5 class="text-center">Share&nbsp;&nbsp;<i class="fas fa-share-alt"></i></h5>
                                
                                <div class="social d-flex justify-content-center">
                                    {!!$sharefacebook!!}
                                    {!!$sharetwitter!!}
                                    {!!$sharetelegram!!}
                                </div>

                            </div>
                        </div>
                        <a href=""class="btn btn-outline-primary primary mt-3" id="back-btn"><i class="fas fa-arrow-left"></i>Back</a>
                    </div>
                </div>
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
                                        <p class="card-text" style="font-size: 11px;"><i class="fas fa-calendar-week"></i>&nbsp;{{\Carbon\Carbon::parse($event->date)->diffForHumans()}}
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
@section('scripts')
<script>
    $(document).ready(function() {
        $('#back-btn').on('click', function() {
            window.history.go(-1);
            return false;
        });
    });
</script>
@endsection