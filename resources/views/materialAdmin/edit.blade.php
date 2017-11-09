@extends('layouts.master')
@section('title', "Material-Create")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <section class="background-main">
      @if(count($errors))
        <div class="col-md-12 pull-left">
          <div class="form-group ">
            <div class="alert alert-error">
              <ul>
              @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
              @endforeach
            </ul>
            </div>
          </div>
        </div>
      @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br/><br /><br />
                <h1>Edit Material</h1>
                <hr>
                {!! Form::open(array('route' =>  ['material.update' , $material->id],'method'=>'PUT', 'files'=>true)) !!}
                {{ Form::label ( 'name' , 'Name:' ) }}
                {{ Form::text  ( 'name' , $material->name , array( 'class' => 'form-control' , 'required' )) }}
                {{ Form::label ( 'description'  , 'Description:' ) }}
                {{ Form::textarea('description' ,   $material->description , array( 'class' => "form-control" , 'required' )) }}

                <label for="Image" class="control-label" style="margin-top: 20px;">Image:</label>
                <img src="{{ asset('images/materials/'. $material->image) }}" height="150" width="150"
                     alt="{{ $material->image }}"/>
                </br>
                {{ Form::label ( 'image'        , 'Upload Material Image' )}} (Recomended Size: 70x80)
                {{ Form::file  ( 'image'        , ['style'=> "margin-bottom:20px;"])}}
                {{ Form::label ( 'pdf'          , 'Upload PDF File' )}}
                @foreach($pdffiles as $pdffile)
                    <p>{{$pdffile->pdf_name}}</p>
                @endforeach
                {{ Form::file  ( 'pdf[]'          , ['style'=> "margin-bottom:20px;", "multiple"=>true])}}

                <select name="color_code[]" id="color_code" multiple="multiple" class="form-control">
                    @foreach ($colors as $key=>$color)

                        <option
                                @if(in_array($key,$materialcolors))
                                {{--@if($key==$collectionitemcollection->id)--}}
                                selected
                                @endif
                                value="{{ $key }}">{{ $color }}</option>
                    @endforeach
                </select>
                {{--{{ Form::label ( 'color_code[]'          , 'Color:' )}}--}}
                {{--{{ Form::select( 'color_code[]' ,  $colors->toarray(), null , [ 'class' => 'form-control' , 'multiple'=>true , 'id'=>'color_code' ]) }}--}}
                {{ Form::label ( 'size'         ,  'Size:' ) }}
                <select name="size[]" id="sizes" multiple="multiple" class="form-control">
                    @foreach ($sizes as $key=>$size)

                        <option
                                @if(in_array($key,$materialcolors))
                                {{--@if($key==$collectionitemcollection->id)--}}
                                selected
                                @endif
                                value="{{ $key }}">{{ $size }}</option>
                    @endforeach
                </select>
                {{--{{ Form::select( 'size[]'       ,  $sizes->toarray(), null , array( 'class' => 'form-control' , 'multiple'=>true , 'id'=>'sizes')) }}--}}
                {{ Form::label ( 'slug'         ,  'Slug:' ) }}
                {{ Form::text  ( 'slug'         , $material->slug, array( 'class' => 'form-control' , 'required' )) }}
                <label for="priority Order" class="control-label" style="margin-top: 20px;">Priority Order:</label>
                <input type="number" name="priorityOrder"  class="form-control" id="priorityOrder" value="{{$material->priority_order}}"
                       min="0"/>
                {{ Form::submit("Next", array('class' => "btn btn-success btn-lg btn btn-block" , 'style'=> "margin-top:20px; margin-bottom:20px;")) }}
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
