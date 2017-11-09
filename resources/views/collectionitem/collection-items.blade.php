@extends('layouts.master')
@section('title', "| View Collection Item")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <main class="background-main img-background-repeat" xmlns:http="http://www.w3.org/1999/xhtml">
        <section id="collection-heading" class="img-background-repeat">
            <div class="container-fluid pad20">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-xss-12 ">
                      @foreach ($collections as $key => $collection)
                        <h1>{{ $collection->name }}</h1>
                      @endforeach
                        </br>
                        <h2>COLLECTIONS</h2>



            @foreach ($collections as $key => $collection)
              @foreach ($collectiontypes as $key => $collectiontype)
              <div class="row margin-bottom20">
              <div class="col-xs-12">
                <span class="txt-collection-side-head">{{ $collection->name }} COLLECTIONS</span><span class="txt-collection-side-head2">{{ '/' }}{{ $collectiontype->name }}
              </span>
              </div>
              </div>


              @endforeach
            @endforeach
            </div>
            </div>
            </div>
        </section>
        <section id="collectionItem">
            <div class="container-fluid pad20">
                <div class="row">
                    @foreach ($collectionitems as $collectionitem)
                        <div class="col-md-3 col-sm-12 sol-xs-12">
                            <div class="carouselGallery-grid ">
                               <a href="{{ route('collectionitems.collection-item', [$collectionslug,$collectiontypeslug,$collectionitem->slug]) }}" target="_blank">
                                    <div class="carouselGallery-col-1 carouselGallery-carousel testimage"
                                         style="background-image:url({{ asset('images/collectionitem/'. $collectionitem->image) }});
                                                 height:256px; max-width:600px;width:100%;margin-bottom: 50px;" hspace="20">
                                </div>
                              </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="text-center pull-right">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="bottom-line">
    </div>

@endsection
{{-- @section('pageSpecificScripts')
    <script type="text/javascript" src="{{ URL::asset('js/carousel.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/social-share-kit.css') }}" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('js/social-share-kit.min.js')}}"></script>
@endsection --}}
