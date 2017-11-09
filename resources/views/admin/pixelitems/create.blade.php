@extends('layouts.master')
@section('title', "CollectionItem-Create")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main"  id ="create-pixel">
	<br /><br /><br />
	<div class="row" >
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Pixel CollectionType Item</h1>
			<hr/>
			<form  method="POST" action="{{ route('admin.pixelitems.store') }}"  class="form-horizontal" id="pixelitem_form" accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}
					<label for="code_number" class="control-label" style="margin-top: 20px;">Code #:</label>
					<input type="text" name="code_number" id="code_number" class="form-control" required />
					<label for="title" class="control-label" style="margin-top: 20px;">Title:</label>
					<input type="text" name="title" id="title" class="form-control"  required/>

					<label for="orderby" class="control-label" style="margin-top: 20px;">OrderBy:</label>
					<input type="number" name="orderby" id="orderby"  value="5" min='0' class="form-control" required />
					<label  for="catalogue_id" class="control-label" style="margin-top: 20px;" >Catalogue:</label>
					{{-- catalogue --}}
					<select name="catalogue_id" class="form-control" id="catalogue_id" required>
						<option value='' disabled selected hidden>Chooose Catalogue</option>
						@if (isset($catalogue))
							@foreach ($catalogue as $key => $value)
								<option value="{{$key}}">{{ $value }}</option>
							@endforeach
						@endif
					</select>
					<label for="featured_image" class="control-label" style="margin-top: 20px;">Image:</label> (Recomended Size: 890x580)
					<input type="file" name="featured_image" id="featured_image"  />
					<input type="checkbox" name='featured' id="featured" />
					<label for="featured" class="control-label" style="margin-top: 20px;">Featured</label> <br />
					<label for="description" class="control-label" style="margin-top: 20px;">Description:</label>
					<textarea name="description"  form="pixelitem_form" id="description" class="form-control" /></textarea>
					<label for="image" class="control-label" style="margin-top: 20px;">Images:</label> (Recomended Size: 890x580)
					<input type="file" name="image[]" id="image" multiple />
					<label for="slug" class="control-label" style="margin-top: 20px;">Slug:</label>
					<input type="text"  name='slug' class="form-control" required mix="5" max='255' />
					<label for="collection" class="control-label" style="margin-top: 20px;">Collection:</label>
					{{-- collection --}}
					@if (isset($collections))
					<select name="collection" id="collection" class="form-control"  required >
						<option value='' disabled selected hidden>Choose Collection</option>
						@foreach ($collections as $key => $collection)
						  <option value="{{ $key }}" id="{{ $collection}}">{{ $collection }}</option>
						@endforeach
					</select>
					@endif
					{{-- collectiontypes --}}
					@if (isset($collectiontypes))
					<label for="collectiontype" class="control-label" style="margin-top: 20px;">Collection Type:</label>
					<select name="collectiontype" id="collectiontype" class="form-control" required>
							@foreach ($collectiontypes as $key => $collectiontypes)
							  <option value="{{ $collectiontypes->id }}"  id="{{ $collectiontypes->name }}">{{ $collectiontypes->name }} </option>
							@endforeach
					</select>
					@endif
					{{-- color --}}
					@if (isset($pixelcolors))
					<label for="color" class="control-label" style="margin-top: 20px;">Pixel Color:</label>
					<select name="color" id="color" class="form-control" required>
						<option value='' disabled selected hidden>Choose Color</option>
						@foreach ($pixelcolors as $key => $pixelcolor)
						  <option value="{{ $pixelcolor->id }}"  id="{{ $pixelcolor->name }}">{{ $pixelcolor->name }} </option>
						@endforeach
					</select>
					@endif
					{{-- design --}}
					@if (isset($pixeldesigns))
					<label for="design" class="control-label" style="margin-top: 20px;">Pixel Design:</label>
					<select name="design[]" id="design" class="form-control" multiple required>
						@foreach ($pixeldesigns as $key => $pixeldesign)
						  <option value="{{ $pixeldesign->id }}"  id="{{ $pixeldesign->name }}">{{ $pixeldesign->name }} </option>
						@endforeach
					</select>
					@endif
					{{-- item-relation --}}
					@if (isset($pixelrelations))
					<label for="relations" class="control-label" style="margin-top: 20px;">Pixel Association:</label>
					<select name="relations[]" id="relations" class="form-control" multiple>
						@foreach ($pixelrelations as $key => $pixelrelation)
						  <option value="{{ $pixelrelation->id }}"  id="{{ $pixelrelation->title }}">{{ $pixelrelation->title }} </option>
						@endforeach
					</select>
					@endif
					<button style="margin-top: 20px" type="submit" class="btn btn-success btn-block"> Create Collection Item </button>
					</form>
		</div>
	</div>
</section>
<div class="bottom-line">
</div>
@endsection
@section('pageSpecificScripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
$('#relations').select2();
$('#design').select2();

</script>
@endsection
