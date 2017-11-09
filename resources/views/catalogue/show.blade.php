@extends('layouts.master')
@section('title', "| View Collection")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main">
		<br /><br /><br />
		<div class="row">
		<div class="col-md-8" style="text-align: center;">
			<h1>{{ $catalogue->name }}</h1>
			<hr>
			<img src="{{ asset('images/catalogues/'.$catalogue->image) }}" height="400" width="800" alt="{{ $catalogue->image }}"/>
			<p class="lead"> {!! $catalogue->description !!} </p>

		</div>
		<div class="col-md-4" style="margin-top: 30px;">
			<div class="well">
				<dl class="dl-horizontal">
				<dt>Created At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($catalogue->created_at)) }} </dd>
				</dl>
				<dl class="dl-horizontal">
				<dt>Updated At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($catalogue->updated_at)) }} </dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
					{!! Html::linkRoute('catalogue.edit','Edit', array($catalogue->id),array('class'=> 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
					{!! Form::open(['route'=> ['catalogue.destroy',$catalogue->id] , 'method' => 'DELETE'])  !!}
					{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])  !!}
					{!! Form::close() !!}
					</div>
				</div>
			</div>

		</div>
	</div>

</section>
@endsection
