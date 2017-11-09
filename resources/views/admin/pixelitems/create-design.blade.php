@extends('layouts.master')
@section('title', "CollectionItem-Create")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero"  id ="create-pixel">
	<div class="row" >
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Pixel-Design</h1>
			<hr/>
			<form  method="POST" action="{{ route('admin.pixelitem.store.design') }}"  class="form-horizontal" id="pixeldesign_form" accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}
					<label for="name" class="control-label" style="margin-top: 20px;">Design Name:</label>
					<input type="text" name="name" id="title" class="form-control"  required/>
					<button style="margin-top: 20px" type="submit" class="btn btn-success btn-block"> Create Pixel Design</button>
					</form>
		</div>
	</div>
</section>
<div class="bottom-line">
</div>
@endsection
