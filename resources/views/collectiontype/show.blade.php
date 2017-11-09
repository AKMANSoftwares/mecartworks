@extends('layouts.master')
@section('title', "| View Collection Type")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
		<div class="col-md-8" style="text-align: center;">
			<h1>{{ $collectiontype->name }}</h1>
			<hr>
			<img src="{{ asset('images/collectiontype/'. $collectiontype->image) }}" height="400" width="800" alt="{{ $collectiontype->image }}"/>
		</div>
		<div class="col-md-4" style="margin-top: 30px;">
			<div class="well">
				<dl class="dl-horizontal">
			<!-- {{--	<dt>Url:</dt>
				<dd><a href="{{ route('diary.single',$post->slug) }}">{{ route('diary.single',$post->slug)}}</a></dd> --}} -->
				<dt>Created At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($collectiontype->created_at)) }} </dd>
				</dl>
				<dl class="dl-horizontal">
				<dt>Updated At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($collectiontype->updated_at)) }} </dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
					{!! Html::linkRoute('collectiontype.edit','Edit', array($collectiontype->id),array('class'=> 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
					{!! Form::open(['route'=> ['collectiontype.destroy',$collectiontype->id] , 'method' => 'DELETE'])  !!}
					{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])  !!}
					{!! Form::close() !!}
					</div>
					<div class="col-sm-12" style="margin-top:20px">
					<a href="{{  route('collectiontype.index') }}" class="btn btn-block btn-primary"><< Show All Collection Types</a>
					</div>
				</div>
			</div>

		</div>
	</div>

</section>
@endsection
