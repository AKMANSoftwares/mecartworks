@extends('layouts.master')
@section('title', "Materail-Size-Create")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero"  id ="create-pixel">
	<div class="row" >
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Material-Size</h1>
			<hr/>
			<form  method="POST" action="{{ route('material-size.store') }}"  class="form-horizontal" id="materialsize_form" accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}
					<label for="size" class="control-label" style="margin-top: 20px;">Size:</label>
					<input type="text" name="size" id="size" class="form-control"  required/>
					<button style="margin-top: 20px" type="submit" class="btn btn-success btn-block"> Create Material Size</button>
					</form>
		</div>
	</div>
</section>
<div class="bottom-line">
</div>
@endsection
