@extends('layouts.master')
@section('title', "Search-Results")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <main class="background-main">
        <section id="diary-heading">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 ">
                        <h1>Search Results</h1>
                    </div>
                </div>
            </div><!-- End of .row-->
        </section>
        <section id="blog-list" class="blog-list-section">
            <div class="container">
              @if(count($catalogues) > 0)
                <div class="row">
                  <h1  class="col-sm-9  col-xs-12">Catalogues</h1>
                    @foreach($catalogues as $catalogue)
                        <div class="col-sm-9  col-xs-12">
                            <a href="{{ url('/catalogues') }}"><h2> {{ $catalogue->name  }}</h2>
                            <p class="text-left">{{  substr(strip_tags($catalogue->description) , 0 ,100) }}{{ strlen(strip_tags($catalogue->description)) > 100?"...":'' }}</p>
                            </a>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <a href=""></a>
                        </div>
                    @endforeach
                </div>
                <hr/>
              @endif

              @if(count($collectiontypes)>0 )
                <div class="row">
                  <h1  class="col-sm-9  col-xs-12">Collection Types</h1>
                    @foreach($collectiontypes as $collectiontype)
                      @foreach ($collectiontype->collections as $key => $collection)
                      <div class="col-sm-9  col-xs-12">
                        <a href="{{ url('/collectionitems/'.$collection->name.'/'.$collectiontype->name) }}"><h2> {{$collection->name }}{{ ' : ' }}{{ $collectiontype->name  }}</h2></a>
                      </div>
                      @endforeach
                    @endforeach
                </div>
                <hr/>
              @endif
              <!-- end of row -->
              @if(count($materials) > 0)
                  <div class="row">
                    <h1 class="col-sm-9  col-xs-12">Materials</h1>
                      @foreach($materials as $material)

                        <div class="col-sm-9  col-xs-12">
                          <a href="{{ url('/materials') }}"><h2> {{ $material->name  }}</h2></a>
                            <p class="text-left">{{  substr(strip_tags($material->description) , 0 ,100) }}{{ strlen(strip_tags($material->description)) > 100?"...":'' }}</p>
                        </div>

                      @endforeach
                  </div>
                  <hr/>
                  @endif
              <!-- end of row -->
              @if(count($diaries) > 0)
                  <div class="row">
                    <h1  class="col-sm-9  col-xs-12">Diary</h1>
                      @foreach($diaries as $diary)

                        <div class="col-sm-9  col-xs-12">
                          <a href="{{ url('/diary/'. $diary->slug) }}"><h2> {{ $diary->title  }}</h2></a>
                            <p class="text-left">{{  substr(strip_tags($diary->description) , 0 ,100) }}{{ strlen(strip_tags($diary->description)) > 100?"...":'' }}</p>
                        </div>

                      @endforeach
                  </div>
                  @endif
              <!-- end of row -->
            </div>
        </section>
    </main>
    <div class="bottom-line"></div>

@endsection
