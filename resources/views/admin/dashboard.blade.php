@extends('layouts.master')
@section('title', "Dashboard")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
  <style media="screen">
  .links > a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
  }
  .links > a:hover {
    color: white;
    background-color: transparent;
    text-decoration: underline;
  }
  .route{
    background-color: #0d2f54;
    padding: 10px;
    font-size: 16px;
    margin-bottom:5px;
  }
  .route:hover{
    background-color: #636b6f;
  }
  .logout{
    background-color: #a94442;
    text-align:center;
  }
  .heading
  {
    text-align:center;
    background-color:transparent;
  }
  h5{
    font-size: 30px;
  }
  </style>
    <main class="background-main">
      <div class="hero">
        <div class='jumbotron heading'>
          <h5>MEC Admin Dashboard</h5>
        </div>
        <div class ='container links'>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('register') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Register</a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('catalogue.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Catalogues </a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('collectiontype.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Collection Types</a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('collection.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Collections</a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('collectionitem.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Collection Items</a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('admin.pixelitem.index.color') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Pixel Item Colors</a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('admin.pixelitem.index.design') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Pixel Item Designs</a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('admin.pixelitems.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Pixel Items</a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('material-color.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Material Colors</a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('material-size.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Material Sizes</a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('material.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Materials</a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('posts.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Posts</a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route ">
          <a href="{{ route('careers.index') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>Careers</a>
        </div>
        <div class=" col-md-offset-2 col-md-8 route logout">
          @if(Auth::check())
          <a href="{{ url('/logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          Logout
          </a>
          <form id="logout-form"
          action="{{ url('/logout') }}"
          method="POST"
          style="display: none;">
          {{ csrf_field() }}
          </form>
          @endif
        </div>
        </div>
      </div>
    </main>
@endsection
