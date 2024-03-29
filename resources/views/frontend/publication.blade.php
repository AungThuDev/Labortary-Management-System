@extends('layouts.page')
@section('public','active')
@section('white','text-white')
@section('link','Publications')
@section('head','Publications')
@section('content')
<!--publications Section-->
<section class="event" id="pub">
        <div class="container">
            <div class="row mt-5">
                <div class="col-2"></div>
                <div class="col-8">
                    <form action="{{route('search-pub')}}" class="form-inline" method="GET">

                        <div class="input-group mb-2 mr-sm-2">

                            <input type="text" class="form-control" id="search" name="search"
                                placeholder="search publications...">
                            <div class="input-group-prepend">
                                <!-- <div class="input-group-text">@</div> -->
                                <button class="btn btn-success"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-2"></div>
            </div>
            <h2>Publications</h2>

            <div class="publications-container">
                @forelse($publications as $pub)
                <article class="row shadow p-3 mb-5">
                    <div class="col-12 col-lg-9 order-last order-lg-first mt-2 mt-lg-0">
                        <h5 class="fw-bold publication-title"><a href="{{$pub->name_link}}">{{$pub->name}}</a></h5>
                        <p class="text-secondary">{{$pub->created_at}} | <a href="{{$pub->journal_link}}">{{$pub->journal}}</a></p>
                        <p class="pt-3">
                            @foreach($pub->authors as $author)
                            <a href="{{$author->author_link}}">{{$author->author_name}}</a> |
                            @endforeach
                            </p>
                    </div>
                    <div class="col-12 col-lg-3 order-first order-lg-last d-flex justify-content-center">
                        <img class="pubication-image" src="{{asset('assets/image/img/research-paper.jpg')}}" alt="Research Paper Cover Photo">
                    </div>
                </article>
                @empty
                <h5 class="text-center">No Publications found....</h5>
                @endforelse
            </div>
            <!--pagination-->
            <div class="d-flex justify-content-center">
                {{$publications->links()}}
            </div>
            <!--End pagination-->
        </div>
    </section>
    <!--End Publications Section-->    
@endsection