@extends('layouts.page')
@section('sub','active')
@section('white','text-white')
@section('link','Subjects')
@section('head','Subjects')
@section('content')
<!--subjects Section-->
<section class="event">
    <div class="container">
        <div class="row mt-5">
            <div class="col-2">
                <a href="{{route('subject')}}" class="btn btn-outline-primary" style="border-radius: 50%;"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="col-8">
                <form action="{{route('search-sub')}}" class="form-inline" method="GET">

                    <div class="input-group mb-2 mr-sm-2">

                        <input type="text" class="form-control" id="search" name="search" placeholder="search Subjects...">
                        <div class="input-group-prepend">
                            <!-- <div class="input-group-text">@</div> -->
                            <button class="btn btn-success"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
        <h2>Subjects</h2>

        <div class="subjects-container">
            @forelse($subjects as $subject)
            <article>
                <h3><a href="">{{$subject->course_name}}</a></h3>
                <div class="row mt-3">
                    <div class="col-12 col-lg-3">
                        <img class="subject-image" src="{{asset('storage/subjectimages/'.$subject->image)}}" alt="subject image">
                    </div>
                    <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="d-flex flex-column flex-md-row flex-lg-row justify-content-start gap-0 gap-md-1 gap-lg-1">
                                    <span class="text-dark">Room : </span> <span class="text-dark poppins">{{$subject->room}}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column flex-md-row flex-lg-row justify-content-start gap-0 gap-md-1 gap-lg-1">
                                    <span class="text-dark">Class Hours :</span> <span class="text-dark poppins">{{$subject->time}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="d-flex flex-column flex-md-row flex-lg-row justify-content-start gap-0 gap-md-1 gap-lg-1">
                                    <span class="text-dark">Instructor Name :</span> <span class="text-dark poppins">{{$subject->instructor_name}}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column flex-md-row flex-lg-row justify-content-start gap-0 gap-md-1 gap-lg-1">
                                    <span class="text-dark">Email :</span> <span class="text-dark poppins">{{$subject->instructor_email}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="d-flex flex-column flex-md-row flex-lg-row justify-content-start gap-0 gap-md-1 gap-lg-1">
                                    <span class="text-dark">Instructor Office :</span> <span class="text-dark poppins">{{$subject->instructor_office}}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column flex-md-row flex-lg-row justify-content-start gap-0 gap-md-1 gap-lg-1">
                                    <span class="text-dark">Office Hours :</span> <span class="text-dark poppins">{{$subject->office_hour}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="d-flex flex-column flex-md-row flex-lg-row justify-content-start gap-0 gap-md-1 gap-lg-1">
                                    <span class="text-dark">Course Start Date:</span> <span class="text-dark poppins">{{$subject->start_date}}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column flex-md-row flex-lg-row justify-content-start gap-0 gap-md-1 gap-lg-1">
                                    <span class="text-dark">End Date :</span> <span class="text-dark poppins">{{$subject->end_date}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <hr>
            @empty
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="text-center">No Subject was found....</h6>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!--End Events Section-->
@endsection