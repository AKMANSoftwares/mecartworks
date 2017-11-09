@extends('layouts.master')
@section('title', "| Edit Post")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
			{!! Form::model($pixelitem,['route'=> ['admin.pixelitems.update' , $pixelitem->id],'method'=>'PUT','files'=>true] ) !!}
			<div class="col-md-8 col-md-offset-1" style="margin-top: 30px;">
				<h1>Edit Pixel Item</h1>
				<hr>
			</div>
			<div class="col-md-8 col-md-offset-1">
			{{ Form::label('code_number','Code #:') }}
				{{ Form::text('code_number', null ,["class" => 'form-control input-lg']) }}
			{{ Form::label('title','Title:') }}
				{{ Form::text('title', null ,["class" => 'form-control input-lg']) }}
			{{ Form::label('orderby','Priority Order:') }}
				{{ Form::number('orderby', null ,array('class' =>"form-control")) }}
			{{ Form::label('catalogue_id','Catalogue Name:')}}
				{{ Form::select('catalogue_id',$catalogues,$pixelitem->catalogue->id,["class"=>'form-control input-lg'])}}
			{{ Form::label('description' ,'Description:') }}
				{{ Form::textarea('description', null , ['class'=>'form-control']) }}
			{{ Form::label('image','Update image')}} (Recomended Size: 890x580)
				{{ Form::file('image[]',['multiple'=>'multiple'])}}
				<input type="checkbox" name='featured' id="featured" @if($pixelitem->featured == true) checked @endif />
				<label for="featured" class="control-label" style="margin-top: 20px;">Featured</label> <br />
			{{ Form::label('slug','Slug:') }}
				{{ Form::text('slug', null ,array('class' =>"form-control" , 'required','minlenght' => '5' , 'maxlenght' =>'255')) }}
			{{ Form::label('collection','Collection:') }}
				{{ Form::select('collection',$collections,$collectioncollectiontype->collection_id,['class'=>'form-control input-lg']) }}
			{{ Form::label('color','Pixel Color:') }}
				{{ Form::select('color',$pixelcolors,$pixelitem->pixelcolor[0]->id,['class'=>'form-control input-lg']) }}
			{{ Form::label('design','Pixel Design:') }}
				{{ Form::select('design',$pixeldesigns,null,['class'=>'form-control input-lg ','id'=>'design','multiple'=>'multiple']) }}
			{{ Form::label('relations','Pixel Association:') }}
				{{ Form::select('relations',$pixelitems,null,['class'=>'form-control input-lg ','id'=>'relations','multiple'=>'multiple']) }}
		</div>
		<div class="col-md-3">
			<div class="well" style="margin-top: 30px;">
				<dl class="dl-horizontal">
				<dt>Created At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($pixelitem->created_at)) }} </dd>
				</dl>
				<dl class="dl-horizontal">
				<dt>Updated At :</dt>
				<dd> {{  date('M j, Y h:ia', strtotime($pixelitem->updated_at)) }} </dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
					{!! Html::linkRoute('admin.pixelitems.show','Cancel', array($pixelitem->id),array('class'=> 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
					{{ Form::submit('Save Changes',['class' => 'btn btn-success btn-block'] ) }}
					</div>
					<div class="col-sm-12" style="margin-top:20px">
					<a href="{{  route('admin.pixelitems.index') }}" class="btn btn-block btn-primary"><< Show All Pixel Items</a>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</section>
@endsection

@section('pageSpecificScripts')
	<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript">
	$('#relations').select2();
	$('#relations').select2().val({!! json_encode($pixelitem->pixel()->allRelatedIds()) !!}).trigger('change');
	$('#design').select2();
	$('#design').select2().val({!! json_encode($pixelitem->pixeldesign()->allRelatedIds()) !!}).trigger('change');
	</script>
@endsection
