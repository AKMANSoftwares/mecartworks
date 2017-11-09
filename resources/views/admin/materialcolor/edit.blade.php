@extends('layouts.master')
@section('title', "| Edit Material Color")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
			{!! Form::model($color,['route'=> ['material-color.update' , $color->id],'method'=>'PUT','files'=>true] ) !!}
			<div class="col-md-8 col-md-offset-1" style="margin-top: 30px;">
				<h1>Edit Material Color</h1>
				<hr>
			</div>
			<div class="col-md-8 col-md-offset-1">
			{{ Form::label('name','Name:') }}
				{{ Form::text('name', null ,["class" => 'form-control input-lg']) }}
        {{ Form::label('color_code','Color Code:') }}
  				{{ Form::text('color_code', null ,["class" => 'form-control input-lg']) }}
        <div class="col-md-12" style="margin:20px;">
            <img src="{{ asset('images/materials/general_colors/'. $color->image) }}" />
        </div>
			{{ Form::label('image','Update image')}}
				{{ Form::file('image')}}
		</div>
		<div class="col-md-3">
			<div class="well" style="margin-top: 30px;">
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
					{!! Html::linkRoute('material-color.show','Cancel', array($color->id),array('class'=> 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
					{{ Form::submit('Save Changes',['class' => 'btn btn-success btn-block'] ) }}
					</div>
					<div class="col-sm-12" style="margin-top:20px">
					<a href="{{  route('material-color.index') }}" class="btn btn-block btn-primary"><< Show All Material Colors</a>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</section>
@endsection
