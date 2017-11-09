@extends('layouts.master')
@section('title', "CollectionItem-Create")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main"  id ="create-pixel">
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
	<div class="row" >
		<br /><br /><br />
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Collection Item</h1>
			<hr/>
			<form  method="POST" action="{{ route('collectionitem.store') }}"  class="form-horizontal" id="collectionitem_form" accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}
					<label for="code_number" class="control-label" style="margin-top: 20px;">Code #:</label>
					<input type="text" name="code_number" id="code_number" class="form-control" required />
					<label for="title" class="control-label" style="margin-top: 20px;">Title:</label>
					<input type="text" name="title" id="title" class="form-control"  required/>
					<label  for="catalogue_id" class="control-label" style="margin-top: 20px;" >Catalogue:</label>
					<select name="catalogue_id" class="form-control" id="catalogue_id">
						@if (isset($catalogue))
							@foreach ($catalogue as $key => $value)
								<option value="{{$key}}">{{ $value }}</option>
							@endforeach
						@endif
					</select>
					<label for="description" class="control-label" style="margin-top: 20px;">Description:</label>
					<textarea name="description"  form="collectionitem_form" id="description" class="form-control" /></textarea>
					<label for="image" class="control-label" style="margin-top: 20px;">Image:</label> (Recomended Size: 400x400)
					<input type="file" name="image" id="image" />
					<label for="slug" class="control-label" style="margin-top: 20px;">Slug:</label>
					<input type="text"  name='slug' class="form-control" required mix="5" max='255' />
					<label for="collection" class="control-label" style="margin-top: 20px;">Collection:</label>

					@if (isset($collections))
					<select name="collection" id="collection" class="form-control"  >
						@foreach ($collections as $key => $collection)
						  <option value="{{ $collection->id }}">{{ $collection->name }}</option>
						@endforeach
					</select>
					@endif
					@if (isset($collections))
					<label for="collectiontype" class="control-label" style="margin-top: 20px;">Collection Type:</label>
					<select name="collectiontype" id="collectiontype" class="form-control" v-model='type'>
						@foreach ($collectiontypes as $key => $collectiontype)
						  <option value="{{ $collectiontype->id }}"  id="{{ $collectiontype->name }}">{{ $collectiontype->name }} </option>
						@endforeach
					</select>
					@endif
				<label for="priority Order" class="control-label" style="margin-top: 20px;">Priority Order:</label>
				<input type="number" name="priorityOrder" id="priorityOrder" value="5" min="0" class="form-control"/>
					<button style="margin-top: 20px" type="submit" class="btn btn-success btn-block"> Create Collection Item </button>
					</form>

		</div>
	</div>
</section>
<div class="bottom-line">
</div>
@endsection
