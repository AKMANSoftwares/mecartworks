@extends('layouts.master')
@section('title', "MEC")
@section('meta-description', "Custom Design")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <section class="hero img-background-repeat">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <h1 class="text-center"><strong>custom design process</strong></h1>
                    <p class="text-center">design to installation</p>
                </div>
            </div>
        </div>
    </section>
    <main class=" main-section video-main sketch-section img-background-repeat" id="sketch-section">
        <header>
            <video autoplay loop poster="">
                <source src="{{ url('video/clip.MP4') }}" type="video/mp4">
                <source src="{{ url('video/clip.ogv') }}" type="video/ogv">
                <source src="{{ url('video/clip.webm') }}" type="video webm">
            </video>
            <h2 class="text-center">SKETCH & VECTOR</h2>
            <p class="text-center  stripe">The MEC design team is always ready to help you with your dream
                design. Just share any inspiration photo,
                pattern, design or even a basic hand drawn sketch and our designers will convert it to a
                mosaic-ready vector line drawing.
            </p>
        </header>
    </main>
    <section class="gap-section img-background-repeat"></section>
    <main class=" main-section video-main sketch-section img-background-repeat" id="color-selection">
        <header>
            <video autoplay loop poster="">
                <source src='{{ url('video/clip2.MP4') }} ' type="video/mp4">
            </video>
            <h2 class="text-center">COLOR SELECTION &#38; 3D RENDER</h2>
            <p class="text-center  stripe"> We pick the tile colors for a mosaic using our specialized software. Our
                design team
                manually adds
                final touches to the generated results for a perfect mosaic look.
            </p>
        </header>
    </main>
    <section class="gap-section img-background-repeat"></section>
    <main class=" main-section video-main sketch-section img-background-repeat" id="making-section">
        <header>
            <video autoplay loop poster="">
                <source src='{{ url('video/clip3.MP4') }} ' type="video/mp4">
            </video>
            <h2 class="text-center">MAKING &#38; EXECUTION</h2>
            <p class="text-center  stripe"> Every project, big or small, is handcrafted with care and precision by our
                Italian-trained
                mosaicists.
                Individual mosaic tiles are manually selected, adjusted and arranged into place.
            </p>
        </header>
    </main>
    <section class="gap-section img-background-repeat"></section>
    <main class=" main-section video-main sketch-section img-background-repeat" id="installation-section">
        <header>
            <video autoplay loop poster="">
                <source src='{{ url('video/clip.MP4') }} ' type="video/mp4">
            </video>
            <h2 class="text-center">INSTALLATION</h2>
            <p class="text-center  stripe"> Your mosaic projects are delivered to you as easy-to-install sheets. Each
                mosaic sheet is
                labelled in a way
                that makes assembly very simple and intuitive.
            </p>


        </header>
    </main>
    <section class="gap-section img-background-repeat"></section>
    <main class=" main-section video-main sketch-section img-background-repeat" id="stun-section">
        <header>
            <video id="hmvid" poster=""  playsinline autoplay muted loop>
                <source src='{{ url('video/clip2.MP4') }} ' type="video/mp4">
            </video>
            <h2 class="text-center">STUNNING RESULT</h2>
            <p class="text-center  stripe"> Attention to detail and quality control at every step of the process leads
                to marvelous
                mosaic masterpieces
                that leave everyone delighted and impressed. We will let the work speak for itself.
            </p>


        </header>
    </main>
    <section class="gap-section img-background-repeat"></section>
    <div class="bottom-line"></div>

@endsection
