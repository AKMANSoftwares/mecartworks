@extends('layouts.master')
@section('title', "Diary-Create")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <main class="background-main img-background-repeat">
        <section id="diary-heading">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 ">
                        <h1>the mec diary</h1>
                    </div>
                </div>
            </div><!-- End of .row-->
        </section>
        <article class="post-content img-background-repeat" >
            <div class="container">
                <div class="row"><!--start of row-->
                    <div class="col-sm-12 col-xs-12">
                        <h2 class="text-left"> {{ $post->title }}</h2>
                        <p class="text-left">{{ date('l-F j,Y', strtotime($post->created_at))  }}</p>
                    </div>
                </div>
                <div class="row single-post">
                    <div class="col-sm-10 col-sm-offset-2">
                        <img src="{{ asset('images/posts/'. $post->image) }}"
                             alt="{{ $post->image }}" class="img-responsive"/>
                    </div>
                </div>
                <div class="row single-post" >
                    <div class="col-sm-12">
                        <p>{!! $post->body !!}</p>
                    </div>
                </div>

                <!-- end of row -->
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="col-md-1 col-md-offset-5 btn-prev-singlePost">
                            @if( ! empty($previous))
                                <span class="next">
                                <a href="{{ route('diary.single',$previous->slug)}}">
                                        <button class="btn-submit">< PREV</button>
                                    </a>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-2  btn-next-singlePost" >
                            @if( ! empty($next))
                                <a href="{{ route('diary.single',$next->slug)}}">
                                        <button class="btn-submit">NEXT ></button></a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </article>
        @include('diary.recentPosts')
    </main>
    <div class="bottom-line">
    </div>
@endsection
