@extends('layouts.master')
@section('title', "| Edit Pixel Design")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
			{!! Form::model($design,['route'=> ['admin.pixelitem.update.design' , $design->id],'method'=>'PUT','files'=>true] ) !!}
			<div class="col-md-8 col-md-offset-1" style="margin-top: 30px;">
				<h1>Edit Pixel Design</h1>
				<hr>
			</div>
			<div class="col-md-8 col-md-offset-1">
			{{ Form::label('name','Name:') }}
				{{ Form::text('name', null ,["class" => 'form-control input-lg']) }}
		</div>
		<div class="col-md-3">
			<div class="well" style="margin-top: 30px;">
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
					{!! Html::linkRoute('admin.pixelitem.show.design','Cancel', array($design->id),array('class'=> 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
					{{ Form::submit('Save Changes',['class' => 'btn btn-success btn-block'] ) }}
					</div>
					<div class="col-sm-12" style="margin-top:20px">
					<a href="{{  route('admin.pixelitem.index.design') }}" class="btn btn-block btn-primary"><< Show All Pixel Designs</a>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</section>
@endsection
