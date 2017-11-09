@extends('layouts.master')
@section('title', "| View Pixel Item")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
  		<div class="col-md-8" style="text-align: center;">
  			<h1>{{ $pixelitem->title }}</h1>
  			<hr>
  			<img src="{{ asset('images/collectionitem/'. $pixelitem->featured_image) }}" height="400" width="800" alt="{{ $pixelitem->featured_image }}"/>
  			<p class="lead"> {!! $pixelitem->description !!} </p>

  		</div>
  		<div class="col-md-4" style="margin-top: 30px;">
  			<div class="well">
  				<dl class="dl-horizontal">
  				<dt>Url :</dt>
  				<dd><a href="{{ url('/pixelitem/single/'.$pixelitem->title) }}" style="color:black">{{ url('/pixelitem/single/'.$pixelitem->title) }}</a></dd>
  				<dt>Created At :</dt>
  				<dd> {{  date('M j, Y h:ia', strtotime($pixelitem->created_at)) }} </dd>
  				</dl>
  				<dl class="dl-horizontal">
  				<dt>Updated At :</dt>
  				<dd> {{  date('M j, Y h:ia', strtotime($pixelitem->updated_at)) }} </dd>
  				</dl>
					<dl class="dl-horizontal">
  				<dt>Catalogue Name :</dt>
  				<dd> {{ $pixelitem->catalogue->name  }} </dd>
  				</dl>
					<dl class="dl-horizontal">
  				<dt>Priority Order :</dt>
  				<dd> {{  $pixelitem->orderby }} </dd>
  				</dl>
  				<hr>
  				<div class="row">
  					<div class="col-sm-6">
  					{!! Html::linkRoute('admin.pixelitems.edit','Edit', array($pixelitem->id),array('class'=> 'btn btn-primary btn-block')) !!}
  					</div>
  					<div class="col-sm-6">
  					{!! Form::open(['route'=> ['admin.pixelitems.destroy',$pixelitem->id] , 'method' => 'DELETE'])  !!}
  					{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])  !!}
  					{!! Form::close() !!}
  					</div>
						<div class="col-sm-12" style="margin-top:20px">
						<a href="{{  route('admin.pixelitems.index') }}" class="btn btn-block btn-primary"><< Show All Pixel Items</a>
						</div>
  				</div>
  			</div>
  		</div>
	</div>
</section>
@endsection
