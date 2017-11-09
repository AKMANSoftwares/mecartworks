@extends('layouts.master')
@section('title', "| View Collection")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
		<div class="col-md-8" style="text-align: center;">
			<h1>{{ $collection->name }}</h1>
			<hr>
			<img src="{{ asset('images/collection/'. $collection->image) }}" height="400" width="800" alt="{{ $collection->image }}"/>
			<p class="lead"> {!! $collection->description !!} </p>

		</div>
		<div class="col-md-4" style="margin-top: 30px;">
			<div class="well">
				<dl class="dl-horizontal">
			<!-- {{--	<dt>Url:</dt>
				<dd><a href="{{ route('diary.single',$post->slug) }}">{{ route('diary.single',$post->slug)}}</a></dd> --}} -->
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
					{!! Html::linkRoute('collection.edit','Edit', array($collection->id),array('class'=> 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
					{!! Form::open(['route'=> ['collection.destroy',$collection->id] , 'method' => 'DELETE'])  !!}
					{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])  !!}
					{!! Form::close() !!}
					</div>
					<div class="col-sm-12" style="margin-top:20px">
					<a href="{{  route('collection.index') }}" class="btn btn-block btn-primary"><< Show All Collections</a>
					</div>
				</div>
			</div>

		</div>
	</div>

</section>
@endsection
