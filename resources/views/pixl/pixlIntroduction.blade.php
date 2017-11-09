@extends('layouts.master')
@section('title', "MEC")
@section('meta-description', "Custom Design")
@section('site_url', "http://www.mecartworks.com")
@section('content')
 <section id="video-landing-pixl" class="pixl-video-section">
        <video autoplay="autoplay" loop="loop" id="bgvid2">
            <source src="http://taxify.co/wp-content/uploads/2014/06/file.mp4" type="video/mp4" />
        </video>
        <div class="pixl-video-flex-container">
             <div class="col-md-8 col-md-offset-0 col-sm-8 ">
                              <div class="pixl-flex-container">
                                <img src="{{ asset('images/pixl/pixl-collection-logo.png') }}"
                                     class="img-responsive " alt="Pixl-Logo" width="210px" height="309px">
                                      <span class="headign-align-left">
                                      <h1 class="text-center ">pixl<h1>
                                      <h3 class="text-center h3-mosaic-align">mosaic</h3>
                                     </span>
                              </div>
                            </div>
        </div>
    </section>
    <main class="background-main img-background-repeat" >

        <section class="pixl-services ">
        <img src="http://placehold.it/280x225" alt="client-logo">
        <img src="http://placehold.it/280x225" alt="client-logo">
        <img src="http://placehold.it/280x225" alt="client-logo">
         <img src="http://placehold.it/280x225" alt="client-logo">
        </section>
        <section class="pixl-mosaic-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 class="text-left">PIXL MOSAIC COLLECTION</h3>
                    <p class="text-left" >
                        MEC designs and fabricates custom, award-winning tile-work. We modernize the creation of architecturally compelling mosaics through fast design iterations, free sampling and American robotic production. Custom tile is now fast and painless. Artaic designs and fabricates custom, award-winning tile-work. We modernize the creation of architecturally compelling mosaics through fast design iterations, free sampling and American robotic production. Custom tile is now fast and painless. Artaic designs and fabricates custom, award-winning tile-work. We modernize the creation of archi- tecturally compelling mosaics through fast design iterations, free sampling and American robotic production. Custom tile is now fast and painless.
                    </p>
                </div>
            </div>
            <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <a href="/pixl/journey">
                    <button class="btn-pixl " type="button" title="See The Pixl Journey">SEE THE PIXL JOURNEY</button>
                </a>
                </div>
            </div>
            <div class="row">
            <div class="col-md-10 col-md-offset-1">
               <div class="bottom-line">
                </div>
            </div>
            </div>
            {{--<section class="pixl-services">--}}
              {{--@foreach ($featured as $feature)--}}
                {{--<img src="{{ asset('images/collectionitem/'.$feature->featured_image) }}" --}}
                     {{--alt="{{ $feature->featured_image }}" />--}}
              {{--@endforeach--}}
            {{--</section>--}}
        </div>
        </section>
        <article class="featured-gallery">
         <div class="container-fluid">
           <div class="row">
             <div class="col-xs-12">
             <div class="pixlCarousel-flex-container">
                 <div class="pixlCarouselItem1">
                    <p class="text-center">GALLERY</p>
                    <div class="txt-featurTop">
                      <h2 class="text-center">FEATURED <br> PIXL DESIGNS</h2>
                     <div class="head-line"></div>
                    </div >
                     <p class="text-center txt-pixl-browse">
                         Browse through our exquisite PIXL mosaic art collection and find the perfect design to match your
                         unique style.
                     </p>
                     <a href="/pixl/mosaic/pixl" class="btn-pix-collection">DISCOVER THE FULL PIXL COLLECTION</a>
                 </div>
                 <div class="pixlCarouselItem2">
                     <div class="owl-carousel">
                         @foreach ($featured as $feature)
                            <a href="{{ url('pixl',$feature->slug) }} ">
                             <div class="img-owl-wrapper">
                                 <img src="{{ asset('images/collectionitem/'.$feature->featured_image) }}" alt="{{ $feature->featured_image }}" />
                             </div>
                            </a>
                         @endforeach
                     </div>
                 </div>
             </div>
             </div>
           </div>
         </div>
          </article>
    </main>
     <div class="bottom-line">
    </div>
@endsection
@section('pageSpecificScripts')
    <script type="text/javascript">
        $(document).ready(function(){

            // OWL CAROUSEL - https://owlcarousel2.github.io/OwlCarousel2/
            $('.owl-carousel').owlCarousel({
                margin:50,
                nav: true,
                navText: [
                    "<i class='fa fa-chevron-circle-left'></i>",
                    "<i class='fa fa-chevron-circle-right'></i>"
                ],
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:false
                    },
                    600:{
                        items:1,
                        nav:false
                    },
                    1000:{
                        items:3,
                        nav:true,
                    }
                }
            });

        });
    </script>

@endsection
