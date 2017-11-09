@extends('layouts.master')
@section('title', "Careers")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<main class="background-main img-background-repeat">
    <section class="career-hero img-background-repeat" id="material-hero">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>
                            MEC CAREERS
                        </h1>
                    </div>
                </div>
            </div>
        </section>
    <section class="careers-list" id="careers-list">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-xs-12">
                <span class="list-color">MEC CAREERS</span>
                    <span>/{{$career->title}}</span>
                 
               
                </div>

                <div class="col-sm-9 col-xs-12">
                    {!!$career->description!!}
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </section>
</main>
<div class="bottom-line">
</div>
@endsection
