@extends('layouts.master')
@section('title', "| View Collection Item")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
		<div class="col-md-8" style="text-align: center;">
			<h1>{{ $collectionitem->name }}</h1>
			<hr>
			<img src="{{ asset('images/collectionitem/'. $collectionitem->image) }}" height="400" width="800" alt="{{ $collectionitem->image }}"/>
			<p class="lead"> {!! $collectionitem->description !!} </p>

		</div>
		<div class="col-md-4" style="margin-top: 30px;">
			<div class="well">
				<dl class="dl-horizontal">
			<!-- {{--	<dt>Url:</dt>
				<dd><a href="{{ route('diary.single',$post->slug) }}">{{ route('diary.single',$post->slug)}}</a></dd> --}} -->
				<dt>Created At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($collectionitem->created_at)) }} </dd>
				</dl>
				<dl class="dl-horizontal">
				<dt>Updated At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($collectionitem->updated_at)) }} </dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
					{!! Html::linkRoute('collectionitem.edit','Edit', array($collectionitem->id),array('class'=> 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
					{!! Form::open(['route'=> ['collectionitem.destroy',$collectionitem->id] , 'method' => 'DELETE'])  !!}
					{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])  !!}
					{!! Form::close() !!}
					</div>
					<div class="col-sm-12" style="margin-top:20px">
					<a href="{{  route('collectionitem.index') }}" class="btn btn-block btn-primary"><< Show All Collection Items</a>
					</div>
				</div>
			</div>

		</div>
	</div>

</section>
@endsection
