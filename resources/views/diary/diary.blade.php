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
        <section id="blog-list" class="blog-list-section">
            <div class="container">
                <div class="row">

                    @foreach($posts as $post)
                        <div class="col-sm-9  col-xs-12">
                            <a href="{{route('diary.single',$post->slug)}}"><h2> {{ $post->title  }}</h2></a>
                            {{--<p class="text-left">Published on: {{ date('D,d,Y', strtotime($post->created_at))  }}</p>--}}
                            <p class="text-left">{{  substr(strip_tags($post->body) , 0 ,350) }}{{ strlen(strip_tags($post->body)) > 350?"...":'' }}</p>
                            <a href="{{route('diary.single',$post->slug)}}"></a>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <a href="{{route('diary.single',$post->slug)}}">
                                <img src="{{ asset('images/posts/'. $post->image) }}"
                                     alt="{{ $post->image }}" height="120" width="120"/></a>
                        </div>

                    @endforeach
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            {!! $posts->links() !!}
                        </div>
                    </div>
                </div>


                <!-- end of row -->

            </div>
        </section>
    </main>

    <div class="bottom-line"></div>

@endsection
