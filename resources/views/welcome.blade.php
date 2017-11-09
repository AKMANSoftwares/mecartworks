@extends('layouts.master')
@section('title', "MEC")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('pageSpecificHeaderFiles')
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/insta/insta.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/social-share-kit.css') }}" type="text/css">
@endsection
@section('content')
<main class="img-background-repeat">
    {{--<section class="homepage">--}}
        {{--<div class="home-test">--}}
            {{----}}
        {{--</div>--}}

    {{--</section>--}}
    <!-- Begin Jumbotron -->
    <article class="homepage">

    <div class="jumbotron jumbotron-main" id="home">
        <div class="my-container">
       <div class="flex-display">
           <div class="hero-img">
               <img src="{{ asset('images/welcome/MEC_BLUE_FINAL_LOGO-02.png') }}"
               class="img-responsive"  alt="web-logo">

           </div>
           <h2>Bespoke Luxury Mosaics</h2>
       </div>
       <a href="#middle">
            <div class="mouse-wraper">
            <div class="post">
                <span> <i class="fa fa-angle-down" aria-hidden="true"></i></span>
            </div>
        </div>
        </a>
    </div>
    </div>
    <!-- End Jumbotron -->
    </article>


    {{--<section class='homepage'>--}}
        {{--<div class="homepage-hero-module">--}}
            {{--<div class="video-container">--}}
                {{--<div class="title-container">--}}
                    {{--<div class="headline">--}}
                    {{--</div>--}}
                    {{--<div class="description">--}}
                        {{--<div class="inner">--}}
                            {{--<img src="{{ asset('images/welcome/MEC_BLUE_FINAL_LOGO-02.png') }}"--}}
                                 {{--class="img-responsive " height="256px" width="256px" alt="web-logo">--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="filter"></div>--}}
                {{--<video autoplay loop class="fillWidth">--}}
                    {{--<source src='{{ url('video/clip3.MP4') }} ' type="video/mp4"/>--}}
                    {{--Your browser does not support the video tag. I suggest you upgrade your browser.--}}
                {{--</video>--}}
                {{--<div class="poster hidden">--}}
                    {{--<img src="http://www.videojs.com/img/poster.jpg" alt="">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <section class="odd-section img-background-repeat" id="middle"></section>
    <section class="slide-1">
    <article class="background-hover-mosaic">
        <div class="text-center">
            <h3 > MOSAIC</h3>
            <a href="/mosaic/collectiontypes">
            <button class="btn-home-dis">
                    Discover the collection 
                    </button>
            
            </a>
        </div>
    </article>
   </section>
   <article class="collection-section">
        <div class="img-cement">
        <div class="cement-section">
                 <img src="{{ asset('images/pixl/pixl-collection-logo.png') }}"
                                     class="img-responsive " alt="pixl-logo" width="140px" height="210px">
        </div>
        </div>
        <div class="img-pixl-mosaic">
        <article class="pixl-mosaic-article">
            <div class="ceramic-pixl-section">
                 <h3 class="text-left">PIXL MOSAIC</h3>
                 <p class="text-left">
                     MEC is one of the leading global producers of handcrafted custom mosaic art. We specialize in all
                     things MOSAIC. Interior or exterior design, glass or marble tile, residential or commercial spaces,
                     mosaic rugs or swimming pools we've got it all covered!
                 </p>
                    <a href="/pixl/introduction" class="col-md-6 col-md-offset-4 col-md-pull-2">
                        <button class="btn-home-dis general-hover">Discover the collection</button>
                    </a>
                </div>
            </article>
        </div>
    </article>
    <section class="odd-section img-background-repeat"></section>
    <article class="collection-section">
        <div class="img-cement">
        <article class="background-hover-cement">
            <div class="cement-section">
                 <h3 class="text-center">cement tiles</h3>
                    <a href="/cement-tiles/collectiontypes">
                        <button class="btn-home-dis">Discover the collection </button>
                    </a>
            </div>
            </article>
        </div>
        <div class="img-ceramic">
        <article class="background-hover-ceramic">
            <div class="ceramic-section">
                 <h3 class="text-center">ceramic tiles</h3>
                    <a href="/ceremic-tiles/collectiontypes">
                        <button class="btn-home-dis">Discover the collection </button>
                    </a>
                </div>
            </article>
        </div>
    </article>
    <article class="wrought-section">
        <div class="img-iron">
        <article class="background-hover-wrought">
            <div class="iron-section" >
                 <h3 class="text-center">wrought iron</h3>
                    <a href="/wrought-iron/collectiontypes">
                        <button class="btn-home-dis">Discover the collection </button>
                    </a>
                </div>
        </article>
        </div>
    </article>
    <section class="odd-section img-background-repeat"></section>
    <section id="video-landing" class="custom-video-section">
        <video autoplay="autoplay" loop="loop" id="bgvid">
            <source src="http://taxify.co/wp-content/uploads/2014/06/file.mp4" type="video/mp4" />
        </video>
        <div class="video-flex-container">
           <h3>Custom Design Process</h3>
        </div>
    </section><!-- #section -->
    {{--<section class="custom-video-section">--}}
        {{--<header>--}}
            {{--<video autoplay loop poster="" class="custom-video" id="myVideo">--}}
                {{--<source src='{{ url('video/clip3.MP4') }} ' type="video/mp4">--}}
            {{--</video>--}}
            {{--<div class="video-flex-container">--}}
                {{--<div class="btn-cursor">--}}
                    {{--<div class="button button--play" onclick="playPause()">--}}
                        {{--<div class="button__shape button__shape--one"></div>--}}
                        {{--<div class="button__shape button__shape--two"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<h3>Custom Design Process</h3>--}}
            {{--</div>--}}
        {{--</header>--}}
    {{--</section>--}}
    <section class="odd-section img-background-repeat"></section>
    @include('layouts.ourclients')
    @include('layouts.socialhub')
    <section id="processProject">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 ">
                    <div class="text-center">
                        <div >
                            <p>Opt for the leading global producers of handcrafted custom mosaic art.</p>
                        </div>
                        <div class="btn-action-home">
                            <div class="button button--play">
                                <div class="button__shape button__shape--one"></div>
                                <div class="button__shape button__shape--two"></div>
                            </div>
                        </div>
                        <div class="text-center btn-action-center">
                            <a href='/custom-design-process'>
                                <div class="btn-action">SEE US IN ACTION<br>
                                    <div id="btn-action-text">our custom design process</div>
                                </div>
                            </a>
                            <a href='/contact/newcustomproject'>
                                <div class="btn-action">LET'S START<br>
                                    <div id="btn-action-text">a new project together</div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
</main>
@endsection
@section('pageSpecificScripts')
    <script src="{{ URL::asset('js/insta/instagramLite.js')}}"  type="text/javascript"></script>
    <script src="{{ URL::asset('js/owl.carousel.min.js') }}"    type="text/javascript"></script>
    <script src="{{ URL::asset('js/social-share-kit.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('.instagram-lite').instagramLite({
                user_id: 3158031301,
                accessToken: '3158031301.1677ed0.7dde07e624f947a4820849e0779f4a22',
                list: true,
                urls: true,
//                limit: 6,
                captions: true,
                date:true,
                navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
                // likes:true,
                // comments_count:true,
            });
        });
        function showSocialShare(el) {
          $(el).next().toggleClass('show-social');
        }
    </script>
    <script type="text/javascript">
        var myVideo = document.getElementById("bgvid");
        function playPause() {
            if (myVideo.paused)
                myVideo.play();
            else
                myVideo.pause();
        }

        var playButton = document.querySelector(".button--play");
        playButton.addEventListener("click",function () {
            console.log("Button clicked.");
            playButton.classList.toggle("button--active");
        });
    </script>
    <script type="text/javascript">
$('.background-hover-mosaic > div > a> button').hover(function(){
    $('.background-hover-mosaic').toggleClass('hover');
    });
    </script>
     <script type="text/javascript">
$('.background-hover-pixlmosaic > div > a> button').hover(function(){
    $('.background-hover-pixlmosaic').toggleClass('hover');
    });
    </script>
     <script type="text/javascript">
$('.background-hover-cement > div > a> button').hover(function(){
    $('.background-hover-cement').toggleClass('hover');
    });
    </script>
    <script type="text/javascript">
$('.background-hover-ceramic > div > a> button').hover(function(){
    $('.background-hover-ceramic').toggleClass('hover');
    });
    </script>
    <script type="text/javascript">
$('.background-hover-wrought > div > a> button').hover(function(){
    $('.background-hover-wrought').toggleClass('hover');
    });
    </script>


@endsection
