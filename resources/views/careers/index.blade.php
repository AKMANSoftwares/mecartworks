@extends('layouts.master')
@section('title', "Careers")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <main class="background-main img-background-repeat">
        <section class="career-hero img-background-repeat">
          <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                            <h1>MEC CAREERS</h1>
                            <p>
                                We specialize in all things MOSAIC. Interior or exterior design, glass or marble
                                tile ,
                                residential or commerical spaces, mosaic rugs or swimming pools we have got it all
                                covered!
                            </p>
                        </div>
                    </div>

                </div>
            
        </section>
        <section id="careers-list" class="careers-list-section">
            <div class="container">
                <div class="row">

                    @foreach($careers as $career)
                        <div class="col-sm-9  col-xs-12 col-md-12 col-lg-12">
                            <a href="careers/{{$career->slug}}"><h2> {{ $career->title  }}</h2></a>
                        </div>


                    @endforeach
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            {!! $careers->links() !!}
                        </div>
                    </div>
                </div>


                <!-- end of row -->

            </div>
        </section>
    </main>

    <div class="bottom-line"></div>

@endsection
