@extends('layouts.master')
@section('title', "| View Careers")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
		<div class="col-md-8" style="text-align: center;">
			<h1>{{ $career->title }}</h1>
			<hr>

			<p class="lead"> {!! $career->description !!} </p>

		</div>
		<div class="col-md-4" style="margin-top: 30px;">
			<div class="well">
				<dl class="dl-horizontal">
				<dt>Created At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($career->created_at)) }} </dd>
				</dl>
				<dl class="dl-horizontal">
				<dt>Updated At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($career->updated_at)) }} </dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
					{!! Html::linkRoute('careers.edit','Edit', array($career->id),array('class'=> 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
					{!! Form::open(['route'=> ['careers.destroy',$career->id] , 'method' => 'DELETE'])  !!}
					{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])  !!}
					{!! Form::close() !!}
					</div>
					<div class="col-sm-12" style="margin-top:20px">
					<a href="{{  route('careers.index') }}" class="btn btn-block btn-primary"><< Show All Careers</a>
					</div>
				</div>
			</div>

		</div>
	</div>

</section>
@endsection
