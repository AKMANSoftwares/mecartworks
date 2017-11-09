@extends('layouts.master')
@section('title', "| View Collection Type")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')

<section class="background-main">
	@if(count($errors))
		<div class="col-md-12 pull-left">
			<div class="form-group ">
				<div class="alert alert-error">
					<ul>
					@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
					@endforeach
				</ul>
				</div>
			</div>
		</div>
	@endif
		<div class="row">
			<br /><br /><br />
			{!! Form::model($collectiontype,['route'=> ['collectiontype.update' , $collectiontype->id],'method'=>'PUT','files'=>true] ) !!}
			<div class="col-md-8 col-md-offset-1" style="margin-top: 30px;">
				<h1>Edit Collection Type</h1>
				<hr>
			</div>
			<div class="col-md-8 col-md-offset-1">
        {{ Form::label('name', 'Name:') }}
          {{ Form::text('name', null , array('class' => 'form-control')) }}
					{{ Form::label('ispixel', 'Is Pixel:') }}
						{{ Form::checkbox('ispixel') }} <br />
        {{ Form::label('image','Upload image')}} (Recomended Size: 480x520)
          {{ Form::file('image')}}
				{{ Form::label('slug','Slug:') }}
					{{ Form::text('slug', null ,array('class' =>"form-control" , 'required','minlenght' => '4' , 'maxlenght' =>'255')) }}
				<label for="priority Order" class="control-label" style="margin-top: 20px;">Priority Order:</label>
				<input type="number" name="priorityOrder"  class="form-control" id="priorityOrder" value="{{$collectiontype->priority_order}}" min="0"/>

		</div>
		<div class="col-md-3">
			<div class="well" style="margin-top: 30px;">
				<dl class="dl-horizontal">
				<dt>Created At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($collectiontype->created_at)) }} </dd>
				</dl>
				<dl class="dl-horizontal">
				<dt>Updated At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($collectiontype->updated_at)) }} </dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
					{!! Html::linkRoute('collectiontype.show','Cancel', array($collectiontype->id),array('class'=> 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
					{{ Form::submit('Save Changes',['class' => 'btn btn-success btn-block'] ) }}
					</div>
					<div class="col-sm-12" style="margin-top:20px">
					<a href="{{  route('collectiontype.index') }}" class="btn btn-block btn-primary"><< Show All Collection Types</a>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</section>
@endsection
