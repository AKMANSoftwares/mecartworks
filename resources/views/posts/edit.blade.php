@extends('layouts.master')
@section('title', "| Edit Post")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main">
		<div class="row">
			{!! Form::model($post,['route'=> ['posts.update' , $post->id],'method'=>'PUT','files'=>true] ) !!}
			<div class="col-md-8 col-md-offset-1" style="margin-top: 30px;">
				<br /><br /><br />
				<h1>Edit Post</h1>
				<hr>
			</div>
			<div class="col-md-8 col-md-offset-1">
			{{ Form::label('title','Title:') }}
				{{ Form::text('title', null ,["class" => 'form-control input-lg']) }}
			{{ Form::label('slug','Slug:') }}
				{{ Form::text('slug', null ,array('class' =>"form-control")) }}
			{{ Form::label('featured-image','Update featured image')}} (Recomended size: 1024x576)
				{{ Form::file('featured-image')}}
			{{ Form::label('body' ,'Post Body:') }}
				{{ Form::textarea('body', null , ['class'=>'form-control']) }}

		</div>
		<div class="col-md-3">
			<div class="well" style="margin-top: 30px;">
				<dl class="dl-horizontal">
				<dt>Created At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($post->created_at)) }} </dd>
				</dl>
				<dl class="dl-horizontal">
				<dt>Updated At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($post->updated_at)) }} </dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
					{!! Html::linkRoute('posts.show','Cancel', array($post->id),array('class'=> 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
					{{ Form::submit('Save Changes',['class' => 'btn btn-success btn-block'] ) }}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
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
