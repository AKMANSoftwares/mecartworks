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
                        <h1>{{$collection->name}}</h1>
                        <h2>
                            Collections
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <article>
            <div class="container-fluid">
                <div class="row">
                    <div class="pull-left padleft50 padleft70">
                    <span class="mosaic-heading-h2">
                      {{$collection->name}} COLLECTIONS
                    </span>
                            <span class="mosaic-heading-h3">/{{$collectiontype->name}}
                    </span>
                            <span class="mosaic-heading-h3">/{{$pixelitem->title}}
                    </span>

                    </div>
                </div>
                </div>
        </article>
        <section class="single-pixel-section">
            <div class="container-fluid" id="toggle-images">
                     <div class="flex-single-pixel-container padtop10">
                     <div class="flex-pixel-item1">
                        <div v-cloak  
                             v-if="image == pixelitem.featured_image">
                                    <img class="img-small"  
                                         src="{{ asset('images/collectionitem/'.$pixelitem->featured_image) }}"
                                          />
                        </div >
                        <div v-cloak v-else-if="image != ''" v-for="imagepixel in pixelitem.pixelimage">
                            <div  
                                  v-if="image == imagepixel.image">
                                <img :src="'/images/collectionitem/pixelimages/'+imagepixel.image" class="img-small"
                                      />
                            </div>
                        </div>
                        <div  
                             v-else>
                             <img class="img-small"   onload="SocialShareKit.init()"
                                  src="{{ asset('images/collectionitem/'.$pixelitem->featured_image) }}"
                                   />
                        </div > 
                     </div>
                     
                         
                        <div class="flex-pixel-item2">
                             <div class="img-detail ipadtop10">
                                        <h2>
                                            {{ $pixelitem->title }}
                                        </h2>
                                        <p id="pixel-code">
                                            Code: {{ $pixelitem->code_number }}
                                        </p>
                                        <p id="pixel-id">
                                            <a href="/catalogues">

                                                Catalogue: {{ $pixelitem->catalogue['name'] }}

                                            </a>
                                        </p>
                                        <span id="pixel-detail" style="height: 20px;color:white;">
                                    <p class="pixel-description">
                                        {{ $pixelitem->description }}
                                    </p>
                                </span>
                                        <span id="pixel-text">
                                    <p> *Get any pattern resized or recolored to better fit your unique requirements. MEC offers 
                                    <a href="/contact/newcustomproject">free customization</a> and alteration on all mosaic patterns. </p>
                                    <p> **AddTek mosaic render is visually similar but may have slight variations due to factors  like; textural diversity in mosaic tesserae and light conditions. </p>
                                </span>
                                    </div>
                                     <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <ul class="social-icons list-inline" >
                                        <li class="txt-share-link">Share </li>
                                        <li>
                                     <span class="ssk-group img-responsive"
                                           data-url="{{ asset("images/collectionitem/pixelimages/".$pixelitem->pixelimage[0]->image) }}"
                                           data-text="share text default">
                                             {{-- <div class='poplink'> --}}
                                         <a href="" class="ssk ssk-facebook" title="facebook"></a>
                                            <a href="" class="ssk ssk-instagram" title="instagram"></a>
                                            <a href="" class="ssk ssk-twitter" title="twitter"></a>
                                         {{--  </div> --}}
                                    </span>
                                        </li>
                                    </ul>
                                    <div class="btn-lg-dev">
                                        <a href="/contact/getpricequote/pixelimage/{{$pixelitem->pixelimage[0]->id}}">
                                            <button class="btn-pixel-single-price btn-general btn-pixel-lg" type="button"
                                                    title="Get Price Quote"> GET PRICE QUOTE</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if(count($pixelitem->pixel)>0)
                            <ul class="list-inline img-additional">
                                        <p> Additional Colors:</p>
                                        @foreach ($pixelitem->pixel as $key => $pixelrelatedcolors)
                                            <li>
                                                <a href="{{ url('pixels',[$pixelrelatedcolors->slug]) }}">
                                                    <img height="72px"
                                                         src="{{ asset('images/collectionitem/'.$pixelrelatedcolors->featured_image) }}"
                                                         width="87px"/>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                 @endif
                                 </div>
                                 </div>
                     <div class="row ">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <ul class="list-inline thumbnail-imgs">
                              <li>
                                <img @click="getImage($event)"   id="{{ $pixelitem->featured_image }}"
                                     src="{{ asset('images/collectionitem/'.$pixelitem->featured_image) }}"
                                      />
                              </li>
                                @foreach ($pixelitem->pixelimage as $key => $pixelimage)
                                    <li>
                                        <img @click="getImage($event)"   id="{{ $pixelimage->image }}"
                                             src="{{ asset('images/collectionitem/pixelimages/'.$pixelimage->image) }}"
                                              />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
        </section>
    </main>
    <div class="bottom-line">
    </div>
@endsection
@section('pageSpecificScripts')
<link href="{{ asset('css/social-share-kit.css') }}" rel="stylesheet" type="text/css"></link>
<script src="{{ URL::asset('js/social-share-kit.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">

        window.onload = function () {
            new Vue
            ({
                el: "#toggle-images",
                data: {
                    pixelitem:{!!$pixelitem!!},
                    image: '',
                },
                methods: {
                    getImage: function (event) {
                        this.image = event.currentTarget.id;
                    },

                },

            });
        }
    </script>
@endsection
