@extends('layouts.master')
@section('title', "CollectionItem-Create")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
	<section class="background-main"  id ="create-pixel">
		<div class="row" >
			<div class="col-md-8 col-md-offset-2">
					<br /><br /><br />
				<h1>Create New Catalogue</h1>
				<hr/>
				<form  method="POST" action="{{ url('admin/catalogue') }}"  class="form-horizontal" id="catalogueForm" accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}

					<label for="name" class="control-label" style="margin-top: 20px;">Name:</label>
					<input type="text" name="name" id="name" class="form-control"  required/>
					<label for="description" class="control-label" style="margin-top: 20px;">Description:</label>
					<textarea name="description" id="description" class="form-control" ></textarea>
					<label for="catalogueLink" class="control-label" style="margin-top: 20px;">Catalogue Link:</label>
					<input type="text" name="catalogueLink" id="catalogueLink" class="form-control" required />
					<label for="image" class="control-label" style="margin-top: 20px;">Image:</label> (Recomended Size: 400x400)
					<input type="file" name="image" id="image" required/>
					<label for="priorityOrder" class="control-label" style="margin-top: 20px;">Priority Order:</label>
					<input type="number" name="priorityOrder" class="form-control" id="priorityOrder" value="5" min="0"/>
					<button style="margin-top: 20px" type="submit" class="btn btn-success btn-block"> Create Catalogue </button>
				</form>

			</div>
		</div>
	</section>
	<div class="bottom-line">
	</div>
@endsection
