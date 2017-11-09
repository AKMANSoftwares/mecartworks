@extends('layouts.master')
@section('title', "Diary-Create")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<br /><br /><br />
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(array('route' => 'posts.store', 'files'=>true)) !!}
				{{ Form::label('title', 'Title:') }}
					{{ Form::text('title', null , array('class' => 'form-control')) }}
				{{ Form::label('slug','Slug:') }}
					{{ Form::text('slug', null ,array('class' =>"form-control" , 'required','minlenght' => '5' , 'maxlenght' =>'255')) }}
				{{ Form::label('featured-image','Upload featured image')}} (Recomended size: 1024x576)
					{{ Form::file('featured-image')}}
				{{ Form::label('body', "Post Body:") }}
					{{ Form::textarea('body', null , array('class' => 'form-control', 'id'=>'body')) }}
					{{ Form::submit("Create New Post", array('class' => "btn btn-success btn-lg btn btn-block" , 'style'=> "margin-top:20px; margin-bottom:20px;")) }}
			{!! Form::close() !!}
		</div>
	</div>
</section>
@endsection

@section('pageSpecificScripts')
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<script>
$(document).ready(function() {
  $('#body').summernote();
});
</script>
@endsection
