@extends('layouts.master')
@section('title', "| View Collection Item")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <main class="background-main img-background-repeat" xmlns:http="http://www.w3.org/1999/xhtml">
        <section class="pixel-single-hero img-background-repeat">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
                        <h1>{{ strtoupper($collection->name) }}</h1>
                        <h2>Collections</h2>
                    </div>
                </div>
            </div>
        </section>
        <article class="collection-item-article">
            <div class="container-fluid">
                <div class="row">
                    <div class="pull-left padleft50 padleft70">
          <span class="mosaic-heading-h2">
      <a href="{{ route('collectiontypes.show', $collection->slug ) }}">
          {{ strtoupper($collection->name) }}COLLECTION
      </a>
      </span>
                        <span class="mosaic-heading-h3">/<a class="txt-collection-item" href="{{ route('collectionitems.collection-items',
[$collectionslug,$collectiontypeslug]) }}">{{ strtoupper($collectiontype->name) }}</a>
 </span>
                    </div>
                    <span class="pull-right collection-next-prev">
        @if($previousitem != false)
                            <a href="{{ route('collectionitems.collection-item', [$collectionslug,$collectiontypeslug,$previousitem->slug]) }}">
             <i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
                        @endif
                        {{ $collectionitemrownumber }} of {{ $totalcollectionitemscount }} @if($nextitem !=false)
                            <a href="{{ route('collectionitems.collection-item', [$collectionslug,$collectiontypeslug,$nextitem->slug]) }}">
                    <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                        @endif
 </span>
                </div>
            </div>
        </article>
        <section class="collection-popup-section">
            <div class="container-fluid">
                <div class="flex-collection-container padtop10">
                    <div class="flex-item1">
                        <img src="{{ asset('images/collectionitem/'. $collectionitem->image) }}"

                             alt="{{ $collectionitem->image }}" />
                    </div>
                    <div class="flex-item2">
                        <div class="img-detail ">
                            <h2>{{ $collectionitem->title }}</h2>
                            <p id="pixel-code">
                                code:{{ $collectionitem->code_number }}
                            </p>
                            <p id="pixel-id" class="pixl-name">
                                CATALOG:<a href="{{ URL('catalogues') }}"> {{ $collectionitem->catalogue['name'] }}</a>
                            </p>
                            <span id="pixel-detail" style="height: 20px; color: white">
                            <p>{{ $collectionitem->description }}</p>
                                    </span>
                            <span id="pixel-text">
              <p>*Get any pattern resized or recolored to better fit your unique requirements. MEC offers
              <a href='/contact/newcustomproject'>free customization</a> and alteration on all mosaic patterns.</p>
              <p>*AddTek mosaic render is visually similar but may have slight variations due to factors like; textural diversity in mosaic tesserae and light conditions.</p>
                             </span>

                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <ul class="single-collec-social social-icons list-inline ">
                                    <li class="txt-share-link">Share</li>
                                    <li>
                    <span class='ssk-group img-responsive'
                          data-url='{{ asset('images/collectionitem/'.$collectionitem->image) }}'
                          data-text=' share text default'>
                        {{--<div class='poplink'>--}}
                        {{--<span class='txt-share-pop-link'>Share</span>--}}
                        <a href='' class='ssk ssk-facebook' title='facebook'></a>
                        <a href='http://www.instagram.com' class='ssk ssk-instagram' title='instagram'
                           target="_blank"></a>
                        <a href='' class='ssk ssk-twitter' title='twitter'></a>
                        {{--</div>--}}
                                                </span>
                                    </li>
                                </ul>
                                <div class="btn-lg-dev btnTop0">
                                    <a href='/contact/getpricequote/{{$collectionitem->id}}'>
                                        <button class='btn-pixel-single-price btn-general btn-pixel-lg'
                                                type='button' title='Get Price Quote'> GET PRICE QUOTE
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>
    <div class="bottom-line">
    </div>
@endsection
@section('pageSpecificScripts')
    {{-- <script type="text/javascript" src="{{ URL::asset('js/carousel.js')}}"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/social-share-kit.css') }}" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('js/social-share-kit.min.js')}}"></script>
    <script type="text/javascript">
        SocialShareKit.init();
    </script>
@endsection
