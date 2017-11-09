@extends('layouts.master')
@section('title', "| Edit Material Size")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
			{!! Form::model($size,['route'=> ['material-size.update' , $size->id],'method'=>'PUT','files'=>true] ) !!}
			<div class="col-md-8 col-md-offset-1" style="margin-top: 30px;">
				<h1>Edit Material Size</h1>
				<hr>
			</div>
			<div class="col-md-8 col-md-offset-1">
			{{ Form::label('size','Size:') }}
				{{ Form::text('size', null ,["class" => 'form-control input-lg']) }}
		</div>
		<div class="col-md-3">
			<div class="well" style="margin-top: 30px;">
				<dl class="dl-horizontal">
				<dt>Created At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($size->created_at)) }} </dd>
				</dl>
				<dl class="dl-horizontal">
				<dt>Updated At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($size->updated_at)) }} </dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
					{!! Html::linkRoute('material-size.show','Cancel', array($size->id),array('class'=> 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
					{{ Form::submit('Save Changes',['class' => 'btn btn-success btn-block'] ) }}
					</div>
					<div class="col-sm-12" style="margin-top:20px">
					<a href="{{  route('material-size.index') }}" class="btn btn-block btn-primary"><< Show All Material Sizes</a>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</section>
@endsection
