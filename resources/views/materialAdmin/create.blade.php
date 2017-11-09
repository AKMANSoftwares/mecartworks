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
			<br /><br /><br />
			<div class="col-md-8 col-md-offset-2">
				<h1>Create New Material</h1>
				<hr>
				{!! Form::open(array('route' => 'material.store', 'files'=>true)) !!}
				{{ Form::label ( 'name' , 'Name:' ) }}
				{{ Form::text  ( 'name' ,  null , array( 'class' => 'form-control' , 'required' )) }}
				{{ Form::label ( 'description'  , 'Description:' ) }}
				{{ Form::textarea('description' ,  null , array( 'class' => "form-control" , 'required' )) }}
				{{ Form::label ( 'image'        , 'Upload Material Image' )}} (Recomended Size: 70x80)
				{{ Form::file  ( 'image'        , ['style'=> "margin-bottom:20px;"])}}
				{{ Form::label ( 'pdf'          , 'Upload PDF File' )}}
				{{ Form::file  ( 'pdf[]'          , ['style'=> "margin-bottom:20px;", "multiple"=>true])}}
				{{ Form::select( 'color_code[]' ,  $colors->toarray(), null , [ 'class' => 'form-control' , 'multiple'=>true , 'id'=>'color_code' ]) }}
				{{ Form::label ( 'size'         ,  'Size:' ) }}
				{{ Form::select( 'size[]'       ,  $sizes->toarray(), null , array( 'class' => 'form-control' , 'multiple'=>true , 'id'=>'sizes')) }}
				{{ Form::label ( 'slug'         ,  'Slug:' ) }}
				{{ Form::text  ( 'slug'         ,  null , array( 'class' => 'form-control' , 'required' )) }}
				<label for="priority Order" class="control-label" style="margin-top: 20px;">Priority Order:</label>
				<input type="number" name="priorityOrder" class="form-control" id="priorityOrder" value="5" min="0"/>
				{{ Form::submit("Next", array('class' => "btn btn-success btn-lg btn btn-block" , 'style'=> "margin-top:20px; margin-bottom:20px;")) }}
				{!! Form::close() !!}
			</div>
		</div>
	</section>
@endsection
