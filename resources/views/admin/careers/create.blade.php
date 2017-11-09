@extends('layouts.master')
@section('title', "Career-Create")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main ">
	@if(count($errors)>0)
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
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Career</h1>
			<hr>
			<form  method="POST" action="{{ url('admin/careers') }}"  class="form-horizontal" id="careerForm"   accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}

					<label for="title" class="control-label" style="margin-top: 20px;">Title:</label>
					<input type="text" name="title" id="title" class="form-control"  required/>
						{{-- <label for="title" class="control-label" style="margin-top: 20px;">Career Body:</label>
					<input type="body" class="control-label" name="body" id="body" /> --}}
					{{ Form::label('body', "Description:") }}
					{{ Form::textarea('body', null , array('class' => 'form-control', 'id'=>'body')) }}

					<label for="slug" class="control-label" style="margin-top: 20px;">Slug:</label>
					<input type="text" name="slug" id="slug" class="form-control" required />
					<label for="priorityOrder" class="control-label" style="margin-top: 20px;">Priority Order:</label>
					<input type="number" name="priorityOrder" id="priorityOrder" value="5" min="0" required/>
					<button style="margin-top: 20px" type="submit" class="btn btn-success btn-block"> Create Career </button>
				</form>
		</div>
	</div>
</section>
@endsection
@section('pageSpecificScripts')

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('#body').summernote();
});
</script>
@endsection