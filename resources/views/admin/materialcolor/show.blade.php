@extends('layouts.master')
@section('title', "| View Material Color")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
  		<div class="col-md-8" style="text-align: center;">
  			<h1>{{ $color->name }}</h1>
  			<hr>
  			<img src="{{  asset('images/materials/general_colors/'. $color->image)  }}" height="400" width="800" alt="{{ $color->image }}"/>
  		</div>
  		<div class="col-md-4" style="margin-top: 30px;">
  			<div class="well">
  				<dl class="dl-horizontal">
  				<dt>Created At :</dt>
  				<dd> {{  date('M j, Y h:ia', strtotime($color->created_at)) }} </dd>
  				</dl>
  				<dl class="dl-horizontal">
  				<dt>Updated At :</dt>
  				<dd> {{  date('M j, Y h:ia', strtotime($color->updated_at)) }} </dd>
  				</dl>
  				<hr>
  				<div class="row">
  					<div class="col-sm-6">
  					{!! Html::linkRoute('material-color.edit','Edit', array($color->id),array('class'=> 'btn btn-primary btn-block')) !!}
  					</div>
  					<div class="col-sm-6">
  					{!! Form::open(['route'=> ['material-color.destroy',$color->id] , 'method' => 'DELETE'])  !!}
  					{!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])  !!}
  					{!! Form::close() !!}
  					</div>
						<div class="col-sm-12" style="margin-top:20px">
						<a href="{{  route('material-color.index') }}" class="btn btn-block btn-primary"><< Show All Material Colors</a>
						</div>
  				</div>
  			</div>
  		</div>
	</div>
</section>
@endsection
