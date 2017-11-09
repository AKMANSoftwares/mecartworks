@extends('layouts.master')
@section('title', "| View Pixel Color")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
  		<div class="col-md-8" style="text-align: center;">
  			<h1>{{ $pixelcolor->name }}</h1>
  			<hr>
  			<img src="{{ asset('images/pixel/colors/'. $pixelcolor->image) }}" height="400" width="800" alt="{{ $pixelcolor->image }}"/>
  		</div>
  		<div class="col-md-4" style="margin-top: 30px;">
  			<div class="well">
  				<dl class="dl-horizontal">
  				<dt>Created At :</dt>
  				<dd> {{  date('M j, Y h:ia', strtotime($pixelcolor->created_at)) }} </dd>
  				</dl>
  				<dl class="dl-horizontal">
  				<dt>Updated At :</dt>
  				<dd> {{  date('M j, Y h:ia', strtotime($pixelcolor->updated_at)) }} </dd>
  				</dl>
  				<hr>
  				<div class="row">
  					<div class="col-sm-6">
  					{!! Html::linkRoute('admin.pixelitem.edit.color','Edit', array($pixelcolor->id),array('class'=> 'btn btn-primary btn-block')) !!}
  					</div>
  					<div class="col-sm-6">
  					{!! Form::open(['route'=> ['admin.pixelitem.destroy.color',$pixelcolor->id] , 'method' => 'DELETE'])  !!}
  					{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])  !!}
  					{!! Form::close() !!}
  					</div>
						<div class="col-sm-12" style="margin-top:20px">
						<a href="{{  route('admin.pixelitem.index.color') }}" class="btn btn-block btn-primary"><< Show All Pixel Colors</a>
						</div>
  				</div>
  			</div>
  		</div>
	</div>
</section>
@endsection
