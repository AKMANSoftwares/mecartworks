@extends('layouts.master')
@section('title', "CollectionItem-Create")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero"  id ="create-pixel">
	<div class="row" >
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Pixel-Color</h1>
			<hr/>
			<form  method="POST" action="{{ route('admin.pixelitem.store.color') }}"  class="form-horizontal" id="pixelcolor_form" accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}
					<label for="name" class="control-label" style="margin-top: 20px;">Color Name:</label>
					<input type="text" name="name" id="title" class="form-control"  required/>
					<label for="image" class="control-label" style="margin-top: 20px;">Image:</label>
					<input type="file" name="image" id=" image"/>
					<button style="margin-top: 20px" type="submit" class="btn btn-success btn-block"> Create Pixel Color</button>
					</form>
		</div>
	</div>
</section>
<div class="bottom-line">
</div>
@endsection
