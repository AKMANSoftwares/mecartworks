@extends('layouts.master')
@section('title', "CollectionType-Create")
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
		<br /><br /><br />
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Collection Type</h1>
			<hr>
			{!! Form::open(array('route' => 'collectiontype.store', 'files'=>true)) !!}
				{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null , array('class' => 'form-control','required'=>'required')) }}
					{{ Form::label('ispixel', 'Is Pixel:') }}
						{{ Form::checkbox('ispixel') }} <br />
				{{ Form::label('image','Upload image')}} (Recomended Size: 480x520)
					{{ Form::file('image',array('required'=>'required'))}}
					{{ Form::label('slug','Slug:') }}
						{{ Form::text('slug', null ,array('class' =>"form-control" , 'required','minlenght' => '4' , 'maxlenght' =>'255')) }}
			<label for="priority Order" class="control-label" style="margin-top: 20px;">Priority Order:</label>
			<input type="number" name="priorityOrder" id="priorityOrder" value="5" min="0" class="form-control"/>
					{{ Form::submit("Create Collection Type", array('class' => "btn btn-success btn-lg btn btn-block" , 'style'=> "margin-top:20px; margin-bottom:20px;")) }}

			{!! Form::close() !!}
		</div>
	</div>
</section>
@endsection
