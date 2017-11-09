@extends('layouts.master')
@section('title', "| View Collection Item")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<main class="background-main img-background-repeat" >
<section id='main' class="img-background-repeat">
    <section class="pixel-index-hero img-background-repeat" >
    <div class="container">
      <div class="row">
      <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12" >
        @foreach ($collections as $key => $collection)
          <h1>{{$collection->name}}</h1>
        @endforeach
        <h2>Collections</h2>
      </div>
      </div>
    </div>
</section>
<section class="pixel-data">
  <div class="container-fluid pad20">
    <div class="row marginpadrt">
      <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
        <div class="pull-left">
          @foreach ($collections as $key => $collection)
            @foreach ($collectiontypes as $key => $collectiontype)
              <span class="mosaic-heading-h2">{{$collection->name}}</span><span class="mosaic-heading-h3">/{{ $collectiontype->name }}</span>
            @endforeach
          @endforeach
        </div>
        <div class="pull-right" id="filter-design" style="width: 325px; display: block;z-index: 500;">
          @if (isset($pixelitems))
               <div  class="txt-filter" style="float: left">
                  Filter By:
                </div>
                <div style="float: left;" class="innerbox">
                  <div style="width: 100px;" v-cloak>
                    <div @click = "toggleDesign()" class="txt-filter2">
                        Design <i class="fa fa-caret-down"></i>
                    </div>
                    <div v-if="showDesign ==true" class="filter-background-name">
                      <span  v-for = "design in pixeldesigns" :id="design.id" @click="designValue($event),setActiveDesign(design.name)">
                        <span style="display:block; text-align:center;" :class="{ active:isActiveDesign(design.name) }">@{{ design.name }}</span>
                      </span>
                    </div>
                  </div>
                   {{-- <select name="pixeldesign_id"  class="pixel-form-control" id="pixeldesign_id" v-model="design" v-on:change="designValue">
                       <option value='' disabled selected hidden>DESIGNS</option>
                       @foreach ($pixeldesigns as $key => $pixeldesign)
                           <option  value="{{$pixeldesign->id}}">{{ $pixeldesign->name }}</option>
                       @endforeach
                   </select> --}}
                </div>
                <div style="float: right;" v-cloak>
                    <div style="width: 100px;">
                             <div @click="toggleColor()" class="txt-filter2" >
                                  COLOR <i class="fa fa-caret-down"></i>
                             </div>
                             <div  v-if="showColor == true" class="filter-background-color">
                               <span  v-for="color in pixelcolors" :id="color.id" @click="colorValue($event),setActiveColor(color.name)">
                                 <img :src="'/images/pixel/colors/'+color.image" width="25px" height="25px;" style="margin-top:3px; margin-right: 5px; "
                                 class="color-image " :class="{ active: isActiveColor(color.name) }"/>
                               </span>
                             </div>

                     </div>
                </div>
            @endif
        </div>
      </div>
    </div>
  </div>
</section>
<section class="filter-img">
  <div class="container-fluid pad20">
  <div class="marginleftneg20 marginpadrt" >
    @foreach ($pixelitems as $pixelitem)
      <div v-if=" color == '' && design == '' ">
          <div class="col-md-3 col-sm-12 sol-xs-12 img-pixl-filter " >
            <div class="carouselGallery-grid ">
              <a href="{{ url('pixels',[$pixelitem->slug]) }}">
                <img src="{{ asset('images/collectionitem/'.$pixelitem->featured_image) }}"
                    hspace="20" alt="{{ $pixelitem->featured_image }}" />
              </a>
            </div>

          </div>
      </div>
    @endforeach
    <div v-else-if="design !='' && color == '' " v-for='pixelitem in pixelitems' >
      <div v-for="designs in pixelitem.pixeldesign" v-if="design == designs.id">
          <div class ="col-lg-3 col-md-3 col-sm-4 col-xs-12 img-pixl-filter  " >
            <a :href ="'/pixels/'+pixelitem.slug">
              <img :src="'/images/collectionitem/'+pixelitem.featured_image"
               hspace="20" :alt="pixelitem.featured_image"/>
            </a>
          </div>
        </div>
        <div v-else></div>
      </div>
      <div  v-for='pixelitem in pixelitems' v-else-if="color != '' && design == ''   ">
        <div  v-for="colors in pixelitem.pixelcolor" v-if="color == colors.id">
            <div class ="col-lg-3 col-md-3 col-sm-4 col-xs-12 img-pixl-filter  " >
              <a :href ="'/pixels/'+pixelitem.slug">
                <img :src="'/images/collectionitem/'+pixelitem.featured_image" :alt="pixelitem.slug"
                 hspace="20"/>
              </a>
            </div>
          </div>
        </div>
        <div  v-for='pixelitem in pixelitems' v-else-if="color != '' && design != ''   ">
          <div  v-for="colors in pixelitem.pixelcolor" v-if="color == colors.id">
            <div v-for="designs in pixelitem.pixeldesign" v-if="design == designs.id">
              <div class ="col-lg-3 col-md-3 col-sm-4 col-xs-12 img-pixl-filter " >
                <a :href ="'/pixels/'+pixelitem.slug">
                  <img :src="'/images/collectionitem/'+pixelitem.featured_image"
                     hspace="20" :alt="pixelitem.slug" />
                </a>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
</section>
</section> {{-- id=main --}}
</main>
<div class="bottom-line">
</div>
@endsection
@section('pageSpecificScripts')
<script type="text/javascript">
window.onload = function ()
{
  var count = 0;
  new Vue({
    el   : "#main",
    data:
    {
      design:'',
      color:'',
      showColor: false,
      showDesign:false,
      activeColorItem: '',
      activeDesignItem:'',
      pixelitems:{!! $pixelitems !!},
      pixelcolors:{!! $pixelcolors !!},
      pixeldesigns:{!! $pixeldesigns !!}
    },
    methods:
    {
      designValue: function(event)
      {
          designId = event.currentTarget.id;
          this.design = designId;
      },
      colorValue: function(event)
      {
          colorId = event.currentTarget.id;
          this.color=colorId ;
      },
      toggleDesign: function()
      {
          this.showDesign = !this.showDesign;
      },
      isActiveDesign: function (menuItem) {
          return this.activeDesignItem === menuItem
      },
      setActiveDesign: function (menuItem) {
          this.activeDesignItem = menuItem // no need for Vue.set()
      },
      toggleColor: function()
      {
          this.showColor = !this.showColor;
      },
      isActiveColor: function (menuItem) {
          return this.activeColorItem === menuItem
      },
      setActiveColor: function (menuItem) {
          this.activeColorItem = menuItem // no need for Vue.set()
      },
    }
  });
}
</script>
@endsection
