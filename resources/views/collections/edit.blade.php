@extends('layouts.master')
@section('title', "| View Collection")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <section class="background-main hero">
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
            {!! Form::model($collection,['route'=> ['collection.update' , $collection->id],'method'=>'PUT','files'=>true] ) !!}
            <div class="col-md-8 col-md-offset-1" style="margin-top: 30px;">
                <h1>Edit Collection</h1>
                <hr>
            </div>
            <div class="col-md-8 col-md-offset-1">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null , array('class' => 'form-control')) }}
                {{ Form::label('description','Description:') }}
                {{ Form::textarea('description', null ,array('class' =>"form-control")) }}
                {{ Form::label('collectiontype','Collection Type:')}}

                <select name="collectionTypesList[]" class="form-control" id="collectionTypesList" multiple>

                    @foreach($collectiontypes as $collectiontype)

                        <option
                                value="{{$collectiontype->id}}" id="collectiontype_{{$collectiontype->id}}"
                                @if(in_array($collectiontype->id,$collectioncoltypeids))
                                selected
                                @endif >
                            {{$collectiontype->name}}

                        </option>
                    @endforeach

                </select>
                </br>
                <img src="{{ asset('images/collection/'. $collection->image) }}" height="150" width="150"  alt="{{ $collection->image }}"/>
                {{ Form::label('image','Upload image')}}
                {{ Form::file('image')}}
                {{ Form::label('slug','Slug:') }}
      						{{ Form::text('slug', null ,array('class' =>"form-control" , 'required','minlenght' => '5' , 'maxlenght' =>'255')) }}

            </div>
            <div class="col-md-3">
                <div class="well" style="margin-top: 30px;">
                    <dl class="dl-horizontal">
                        <dt>Created At :</dt>
                        <dd> {{  date('M j, Y h:ia', strtotime($collection->created_at)) }} </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Updated At :</dt>
                        <dd> {{  date('M j, Y h:ia', strtotime($collection->updated_at)) }} </dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('collection.show','Cancel', array($collection->id),array('class'=> 'btn btn-danger btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Save Changes',['class' => 'btn btn-success btn-block'] ) }}
                        </div>
                        <div class="col-sm-12" style="margin-top:20px">
              					<a href="{{  route('collection.index') }}" class="btn btn-block btn-primary"><< Show All Collections</a>
              					</div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
