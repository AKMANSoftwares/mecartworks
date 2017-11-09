@extends('layouts.master')
@section('title', "| View Post")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main">
		<div class="row">
			<br /><br /><br />
		<div class="col-md-8" style="text-align: center;">
			<h1>{{ $post->title }}</h1>
			<hr>
			<img src="{{ asset('images/posts/'. $post->image) }}" height="400" width="800" alt="{{ $post->image }}"/>
			<p class="lead"> {!! $post->body !!} </p>

		</div>
		<div class="col-md-4" style="margin-top: 30px;">
			<div class="well">
				<dl class="dl-horizontal">
				<dt>Url:</dt>
				<dd><a href="{{ route('diary.single',$post->slug) }}">{{ route('diary.single',$post->slug)}}</a></dd>
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
					{!! Html::linkRoute('posts.edit','Edit', array($post->id),array('class'=> 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
					{!! Form::open(['route'=> ['posts.destroy',$post->id] , 'method' => 'DELETE'])  !!}
					{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])  !!}
					{!! Form::close() !!}
					</div>
				</div>
			</div>

		</div>
	</div>

</section>
@endsection
