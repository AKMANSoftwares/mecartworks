@extends('layouts.master')
@section('title', "MEC")
@section('meta-description', "Custom Design")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <main class="background-main img-background-repeat">
        <article class="main-head img-background-repeat">
            <div class="container">
                <div class="row-content100">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-7 col-md-offset-5 col-sm-8 col-sm-offset-4 col-xs-10 col-xs-offset-2">
                                <img src="{{ asset('images/pixl/pixl-collection-logo.png') }}"
                                     class="img-responsive " alt="pixl-logo" width="210px" height="309px">
                            </div>
                        </div>
                        <h1 class="text-center">The Pixl Journey</h1>
                    </div>
                </div>
            </div>
        </article>
        <article class="pixl-journey-video">
          <div class="container">
            <iframe  src="https://www.youtube.com/embed/246383iCWzU" frameborder="0" ></iframe>
            </div>
        </article>
     {{--    <article>
              <!-- the class "videoWrapper169" means a 16:9 aspect ration video. Another option is "videoWrapper43" for 4:3. -->
  <div class="videoWrapper videoWrapper169 js-videoWrapper">
    <!-- YouTube iframe. -->
    <!-- note the iframe src is empty by default, the url is in the data-src="" argument -->
    <!-- also note the arguments on the url, to autoplay video, remove youtube adverts/dodgy links to other videos, and set the interface language -->
    <iframe class="videoIframe js-videoIframe" src="" frameborder="0" allowTransparency="true" allowfullscreen data-src="https://www.youtube.com/embed/hgzzLIa-93c?autoplay=1& modestbranding=1&rel=0&hl=sv"></iframe>
    <!-- the poster frame - in the form of a button to make it keyboard accessible -->
    <button class="videoPoster js-videoPoster" style="background-image:url(http://i2.wp.com/www.cgmeetup.net/home/wp-content/uploads/2015/05/Avengers-Age-of-Ultron-UI-Reel-1.jpg);">Play video</button>
  </div>
        </article> --}}
        <section class="summer-story marginBottom80">
            <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">
                <p class="text-center summer-story-align">
                    We have grown and come a long way since 1979, when the MEC founder set out on a mission to revive
                    and promote the ancient timeless art of mosaic making.
                </p>
                <p class="text-center summer-story-align">
                    Over the decades we have constantly learned about, adopted and even created innovative custom mosaic
                    design and fabrication techniques. For us, staying true to the original artform of handcrafted mosaics, is vital.
                </p>
                <p class="text-center">
                    PIXL mosaic is brought to you by our latest technological marvel. Like its namesake concept, the PIXL range.
                    fea- tures numerous mosaic tiles arranged together in a simple grid (like pixels) to create bigger
                    images that are nothing short of masterpieces.
                </p>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">
                <div class="img-pixl-story1">

                </div>
            </div>
        </section >
        <section class="summary-international ">
            <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">
                <div class="img-pixl-technology">

                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12 txt-pix">
                <p class="text-center summer-story-align">
                    With advancement in technology and the demand of the fast moving world we have always focused
                    on staying abreast with the latest in the world of mosaic tile art.
                </p>
                <p class="text-center summer-story-align">
                    Our designers and the R&D department hold brain- storming sessions several times a year  and recently
                    one of our main concerns and focus was on streamlining the process  and making it faster, more precise
                    but more cost efficient at the same time.
                </p>
                <p class="text-center">
                    We needed a way to process and fabricate larger and more complex abstract patterns in a fraction of the
                    time it usually takes and slash the cost and prices as well, making it truly more accessible to everyone.
                </p>
            </div>
        </section>
       <section  class="story ">
           <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12 txt-story-marginTop10">
               <p class="text-center summer-story-align">
                   A consensus was reached regarding finding or develop- ing a much needed intelligent system for better
                   image processing and quicker fabrication of the mosaics. One thing was for sure, we could not abandon
                   our core vision of providing handcrafted mosaics. So what we knew  we had to find the perfect balance
                   between modern and the timeless ancient techniques. There is no match for the creative touch of a
                   human, an artist. The machine can only do so much, organic eye for details cannot be programmed.
               </p>
               <p class="text-center">
                   Next step was to find the right software and technology partner, a team that could understand
                   the essence mosaic artform and collaborate with MEC to develop a software application
                   exclusively made to suit our design and production goals and revolutionize the process.
               </p>
           </div>
           <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">
               <div class="img-pixl-techniques">
                   <!--TODO image here -->
               </div>
           </div>
       </section>
        <section class="summary-international">
            <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">
                <div class="img-pixl-addTek">
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12 addTekTop">
                <p class="text-center txt-offroad-align">
                    OffRoad Solutions got on board with us and together with the MEC R&D and design teams an innovative
                    bespoke system, AddTek, was created. This software, the likes of which were unheard of, opened up
                    a world of possibilities. With AddTek, our designer can convert any design or image into a digital
                    mosaic tile pattern. The designers, can manually tweak individual tile colors and design sections
                    to give the finishing touches.
                </p>
                <p class="text-center">
                    Our exclusive AddTek software can convert any image or design no matter how abstract or complex in
                    mosaic- ready drawing  using the glass mosaic tile colors from our extensive tesserae library.
                    The PIXL render produced by AddTek is visually same as the real mosaic with very minimal variation.
                    So what you see is exactly what you get. Our designers can pick and try different grout colors to see
                    which one works best with a certain mosaic theme and overall palette.
                </p>
            </div>
        </section>
        <section  class="story ">
            <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12 addLedTop">
                <p class="text-center txt-file-align">
                    This file can then be transferred to our tailor-made OffRoad Solutions hardware, an LED grid board.
                    The system is simple yet genius. Mosaic tiles are arranged by hand over that board, one color at a time.

                </p>
                <p class="text-center">
                    Grid sections light up to indicate all the places one certain color is supposed to go on the mosaic pattern.
                    Each tile is placed by hand. This saves up so much time that goes into manually matching and finding
                    the tile colors. The result? Stunning handcrafted mosaic master- pieces, ready in half of the time,
                    at amazingly affordable prices! That is the ultimate goal, to make mosaic tile art accessible to
                    everyone from small home owners to world-class mega resort and hotel chains. From a humble office
                    lobby or an aesthetic backyard to com- mercial and public projects of virtually any scale;
                    PIXL has the perfect mosaic option to embellish just about any space.
                </p>
            </div>

                <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">
                    <div class="img-pixl-grid">
                        <!--TODO image here -->
                    </div>
                </div>

        </section>
        <section class="summary-international">
            <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12">
                <div class="img-pixl-client">
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6 col-xs-12 addTileTop">
                <p class="text-center txt-suit-align">
                    Choose from the existing designs and have it custom- ized to better suit your style or have us make
                    an entirely new custom design. We are always ready to help you with your dream design. Just share
                    any inspiration photo, pattern, and design or even a basic hand drawn sketch and let us take care of
                    the rest. Our designers and craftsmen will convert it to a PIXL mosaic with the help of AddTek and a
                    wide selection of mosaic tiles.
                </p>
                <p class="text-center txt-suit-align">
                    At MEC, we encourage the involvement of the client and/or architect
                    at every stage. This is why we offer free mosaic design renders and customized option. We pre- pare
                    samples of mosaics on request, so the client can have a true look and feel of the color palette and
                    the materials.
                </p>
            </div>
        </section>
         <section class="fast-design">
             <p class="text-center">
                 With PIXL you get the best of both worlds; faster mosaic design and fabrication with the help of
                 revolutionary technology and the luxurious touch of custom handcrafted art by Italian-trained craftsmen.
                 All this at a price that cannot be matched.
             </p>
             <div class="heading-line text-center"></div>
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
                           </a>
                             </div>
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
    // $('#main-slider .owl-carousel').owlCarousel(
    //     {
    //         items: 1,
    //         margin: 0,
    //         loop: true,
    //         nav: false,
    //         navText: ['Back','Next'],
    //         dots: false,
    //         dotsEach: true,
    //         autoplay: true,
    //         autoplaySpeed: 500,
    //         animateOut: 'fadeOut',
    //         animateIn: 'fadeIn',
    //     }
    // );
    // $('#owl-1 .owl-carousel').owlCarousel(
    //     {
    //         items: 4,
    //         margin: 16,
    //         loop: true,
    //         stagePadding: 64,
    //         nav: true,
    //         // navText: ['Back','Next'],
    //         navText: ['',''],
    //         // navText: ["<img src='myprevimage.png'>","<img src='mynextimage.png'>"],
    //         dots: false,
    //         dotsEach: true,
    //         lazyLoad: false,
    //         autoplay: true,
    //         autoplaySpeed: 500,
    //         navSpeed: 500,
    //         autoplayTimeout: 2000,
    //         autoplayHoverPause: true,
    //     }
    // );

//     $('#owl-2 .owl-carousel').owlCarousel(
//         {
//             items: 5,
//             margin: 16,
//             stagePadding: 32,
//             loop: true,
//             autoplay: false,
//             autoplaySpeed: 500,
//             navSpeed: 500,
//             dots: false,
//             dotsEach: true,
//             nav: true,
//             // navText: ['Back','Next'],
//             navText: ['',''],
//             autoplayTimeout: 2000,
//             autoplayHoverPause: false,
//             animateOut: 'slideOutDown',
//             animateIn: 'flipInX',
//         }
//     );



});

</script>
@endsection
