<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/mynav.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css'>


    <title>@yield('title') | MEC Artworks</title>
    <meta name="description" content="@yield('meta-description')">
    <meta name="robots" content="index,follow">
    <meta property="og:title" content="@yield('title') | MEC Artworks"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="MEC Artworks"/>
    <meta property="og:url" content="@yield('site_url')"/>
    <meta property="og:description" content="@yield('meta-description')"/>
    {{--<meta property="og:image" content="@yield('og-image')" />--}}
    <meta name="twitter:title" content="@yield('title') | MEC Artworks"/>
    <meta name="twitter:url" content="@yield('site_url')"/>
    <meta name="twitter:card" content="summary"/>
    <meta property="twitter:title" content="@yield('title') | MEC Artworks"/>
    <meta property="twitter:description" content="@yield('meta-description')"/>
    <!--TODO: validation for MS Bing -->

    {{--<meta property="twitter:image" content="http://www.sample.com/image.jpg" />--}}

<!-- TODO jquery is being included in Create & Edit posts.. if it gets included here. remove from those files -->

    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "Organization",
          "url": "http://www.mecartworks.com/",
          "logo": "http://www.mecartworks.com/images/logo.png",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "http://www.mecartworks.com/?s={search_term_string}",
            "query-input": "required name=search_term_string"
          },
          "contactPoint": [
          {
            "@type": "ContactPoint",
            "telephone": "+1-416-252-6119",
            "contactType": "customer service",
            "areaServed": [
              "US",
              "CA"
            ]
          },
          {
            "@type": "ContactPoint",
            "telephone": "+92-51-573-1291",
            "contactType": "customer service"
          }],
          "sameAs": [
            "https://www.houzz.com/pro/mecartworks",
            "https://mecartworks.blogspot.com/",
            "https://twitter.com/mecarts",
            "https://www.facebook.com/mecarts",
            "https://plus.google.com/+Mecartworksmosaic"
          ]
        }

    </script>
    @yield('pageSpecificHeaderFiles')
</head>
<body>
@include('layouts.loader')
@include('layouts.nav-background')
@include('layouts.header')
@yield('content')
<footer>
    @include('layouts.footer')
</footer>

<script type="text/javascript" src="{{ URL::asset('js/app.js')}}"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.ui.min.js'></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="text/javascript" src="{{ asset('js/owl.carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom-carousel.js') }}"></script>
{{--<script src="http://pupunzi.com/mb.components/mb.YTPlayer/demo/inc/jquery.mb.YTPlayer.js"></script>--}}
{{--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>--}}

<script type="text/javascript" src="{{ URL::asset('js/index.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/custom.js')}}"></script>

{{-- loader function --}}
<script type="text/javascript">
  $(window).on('load', function() {
    $('#loading').fadeOut("slow");
  });
</script>
@yield('pageSpecificScripts')

<!-- TODO Google Analytics Script -->

</body>
</html>
