@extends('layouts.master')
@section('title', "| View Collection Item")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <main class="background-main img-background-repeat">
        <section id="collection-heading" class="img-background-repeat">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 col-xss-12 ">
                      @foreach ($collections as $key => $collection)
                        <h1>{{$collection->name}}</h1>
                        </br>
                        <h2>COLLECTIONS</h2>
                      @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section id="collectiontype">
            <div class="container-fluid pad20">
                <div class="row">
                @foreach ($collections as $collection)
                    @foreach ($collection->types as $collectiontype)
                            <div class="col-md-4 col-sm-6  sol-xs-12">
                                <div class="collection-image-box">
                                    <div class="collection-img-container">
                                      @if($collectiontype->ispixel == '1')
                                        <a href="{{ url('pixl', [$collection->slug,$collectiontype->slug]) }} ">
                                            <img src="{{ asset('images/collectiontype/'. $collectiontype->image) }}"
                                                width="480px" height="520px" alt="{{$collectiontype->image}}"/>
                                                <p class="center">
                                                    {{ $collectiontype->name }}
                                                </p>
                                            <div  class="collection-hover-box" id="contact"></div>
                                        </a>
                                      @else
                                        <a href="{{ route('collectionitems.collection-items', [$collection->slug,$collectiontype->slug]) }} ">
                                            <img src="{{ asset('images/collectiontype/'. $collectiontype->image) }}"
                                                width="480px" height="520px" alt="{{$collectiontype->image}}"/>
                                                <p class="center">
                                                    {{ $collectiontype->name }}
                                                </p>
                                            <div  class="collection-hover-box" id="contact"></div>
                                        </a>
                                      @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                  @endforeach
                </div>
            </div>
        </section>
    </main>
    <div class="bottom-line"></div>
@endsection
