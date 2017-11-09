@extends('layouts.master')
@section('title', "Collection-Create")
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
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Collection</h1>
			<hr>
			{!! Form::open(array('route' => 'collection.store', 'files'=>true)) !!}
				{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null , array('class' => 'form-control')) }}
				{{ Form::label('description','Description:') }}
					{{ Form::textarea('description', null ,array('class' =>"form-control")) }}
					{{ Form::label('slug','Slug:') }}
						{{ Form::text('slug', null ,array('class' =>"form-control" , 'required','minlenght' => '5' , 'maxlenght' =>'255')) }}
				{{ Form::label('collectiontype','Collection Type:')}}
						{{ Form::select('collectiontype[]',$collectiontypes->toArray(),null,['class'=> 'form-control','multiple'=>true , 'id'=>'collectiontype']
						)}}

				{{ Form::label('image','Upload image')}}
					{{ Form::file('image',	array('required'=>'required'))}}
					{{ Form::submit("Create Collection", array('class' => "btn btn-success btn-lg btn btn-block" , 'style'=> "margin-top:20px; margin-bottom:20px;")) }}
			{!! Form::close() !!}
		</div>
	</div>
</section>
@endsection
