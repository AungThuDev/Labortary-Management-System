@extends('layouts.page')
@section('member','active')
@section('white','text-white')
@section('link','Members')
@section('head','Active Members Detail')
@section('content')
<!--Current Members Section-->
<section class="members">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <a href="" style="border-radius: 50%;margin-top:40px;" class="btn btn-outline-primary" id="back-btn"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="col-10">
                <h2 style="margin-right:220px;" class="member_header">Active Members</h2>
            </div>
            <div class="col-2"></div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-8" style="margin: auto;">
                        <div class="row">

                            <div class="col-lg-12 card-advisor">
                                <div class="card img-card">
                                    <img src="{{asset('storage/memberimages/'.$member->image)}}" style="width:300px;height:300px;" class="card-img-top img-top" alt="Active Members Photos of Innovative Lab">
                                    <hr>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <h4 class="card-title" style="text-align: start;font-size:20px;font-weight:900!important;">
                                                    Name : <span style="font-size:20px;color: #2f79ba;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$member->name}}</span></h4>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <h4 class="card-title" style="text-align: start;font-size:20px;font-weight:900;">
                                                    Position : <span style="font-size:20px;color: #2f79ba;">&nbsp;&nbsp;{{$member->position}}</span></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <h4 class="card-title" style="text-align: start;font-size:20px;">Education</h4>
                                                <div style="text-align: start;margin-left:-30px;">
                                                    <ul style="list-style: none;">
                                                        @foreach($member->memberedu as $education)
                                                        <li><span style="font-size:18px;color: #2f79ba;"><i style="font-size: 14px;" class="fas fa-user-graduate"></i>&nbsp;&nbsp;{{$education->description}}</span></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <h4 class="card-title" style="text-align: start;font-size:20px;">Related Research</h4>
                                                <div style="text-align: start;margin-left:-30px;">
                                                    <ul style="list-style: none;">
                                                        @foreach($member->research as $research)
                                                        <li><span style="font-size:18px;color: #2f79ba;"><i style="font-size: 14px;" class="fab fa-researchgate"></i>&nbsp;&nbsp;{{$research->name}}</span></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 style="text-align: start;">About Candidate</h4>
                                        <p style="text-align: justify;">{!!nl2br($member->about)!!}</p>
                                        <div class="socials">
                                            <a href="{{$member->facebook}}"><i class="fa fa-facebook" style="color: #316FF6;"></a></i>
                                            <a href="{{$member->instagram}}"><i class="fab fa-instagram"></i></a>
                                            <a href="{{$member->twitter}}"><i class="fa fa-twitter"></i></a>
                                        </div>
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