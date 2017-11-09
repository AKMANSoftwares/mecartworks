@extends('layouts.master')
@section('title', "MEC")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
      <img src="{{ asset('images/collection/main-image.png') }}"  width="100%" alt="main-image" />
      @foreach ($collections as $collection)
        <div class="col-lg-12">
          <a href="{{ route('collectiontypes.show', $collection->slug ) }}">
            <img src="{{ asset('images/collection/'. $collection->image) }}" width="100%" alt="{{$collection->image}}"  />
          </a>
        </div>
      @endforeach
</section>
  @endsection
  <script>
  function submit() {
  document.getElementById('#form').submit();
  }
  </script>
