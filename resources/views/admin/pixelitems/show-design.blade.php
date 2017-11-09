@extends('layouts.master')
@section('title', "| View Pixel Design")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
  		<div class="col-md-8" style="text-align: center;">
  			<h1>{{ $design->name }}</h1>
  			<hr>
  		</div>
  		<div class="col-md-4" style="margin-top: 30px;">
  			<div class="well">
  				<dl class="dl-horizontal">
  				<dt>Created At :</dt>
  				<dd> {{  date('M j, Y h:ia', strtotime($design->created_at)) }} </dd>
  				</dl>
  				<dl class="dl-horizontal">
  				<dt>Updated At :</dt>
  				<dd> {{  date('M j, Y h:ia', strtotime($design->updated_at)) }} </dd>
  				</dl>
  				<hr>
  				<div class="row">
  					<div class="col-sm-6">
  					{!! Html::linkRoute('admin.pixelitem.edit.design','Edit', array($design->id),array('class'=> 'btn btn-primary btn-block')) !!}
  					</div>
  					<div class="col-sm-6">
  					{!! Form::open(['route'=> ['admin.pixelitem.destroy.design',$design->id] , 'method' => 'DELETE'])  !!}
  					{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])  !!}
  					{!! Form::close() !!}
  					</div>
						<div class="col-sm-12" style="margin-top:20px">
						<a href="{{  route('admin.pixelitem.index.design') }}" class="btn btn-block btn-primary"><< Show All Pixel Designs</a>
						</div>
  				</div>
  			</div>
  		</div>
	</div>
</section>
@endsection
