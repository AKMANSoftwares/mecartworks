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
				<h1>Edit Collection Item</h1>
				<hr/>

				<form  method="POST" action="{{URL('admin/collectionitem/'.$collectionitem->id)}}"  class="form-horizontal" id="collectionitem_form" accept-charset="UTF-8" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{method_field('PUT')}}
					<input type="hidden" name="collectionItemId" value="{{$collectionitem->id}}"
					<label for="code_number" class="control-label" style="margin-top: 20px;">Code #:</label>
					<input type="text" name="code_number" id="code_number" class="form-control" value="{{$collectionitem->code_number}}" required />
					<label for="title" class="control-label" style="margin-top: 20px;">Title:</label>
					<input type="text" name="title" id="title" class="form-control"  value="{{$collectionitem->title}}" required/>
					<label  for="catalogue_id" class="control-label" style="margin-top: 20px;" >Catalogue:</label>

					<select name="catalogue_id" class="form-control" id="catalogue_id">
						@if (isset($catalogue))

							@foreach ($catalogue as $key => $value)

								<option
										@if($key==$collectionitem->catalogue_id)
										selected
										@endif
										value="{{$key}}">{{ $value }}

								</option>
							@endforeach
						@endif
					</select>
					<label for="description" class="control-label" style="margin-top: 20px;">Description:</label>
					<textarea name="description"  form="collectionitem_form" id="description" class="form-control" >{{$collectionitem->description}}</textarea>
					<label for="image" class="control-label" style="margin-top: 20px;">Image:</label> (Recomended Size: 400x400)
					<img src="{{ asset('images/collectionitem/'. $collectionitem->image) }}" height="400" width="800" alt="{{ $collectionitem->image }}"/>
					<input type="file" name="image" id="image" />
					<label for="slug"  class="control-label" style="margin-top: 20px;">Slug:</label>
					<input type="text" value="{{$collectionitem->slug}}"  name='slug' class="form-control" required mix="5" max='255' />
					<label for="collection" class="control-label" style="margin-top: 20px;">Collection:</label>
					@if (isset($collections))
						<select name="collection" id="collection" class="form-control"  >
							@foreach ($collections as $key => $collection)

								<option
										@if($collection->id==$collectionitemcollection->id)
										selected
										@endif
										value="{{ $collection->id }}">{{ $collection->name }}</option>
							@endforeach
						</select>
					@endif
					@if (isset($collections))
						<label for="collectiontype" class="control-label" style="margin-top: 20px;">Collection Type:</label>
						<select name="collectiontype" id="collectiontype" class="form-control" v-model='type'>
							@foreach ($collectiontypes as $key => $collectiontype)
								<option
										@if($collectiontype->id==$collectiontypeid)
										selected
										@endif
										value="{{ $collectiontype->id }}"  id="{{ $collectiontype->name }}">{{ $collectiontype->name }} </option>
							@endforeach
						</select>
					@endif
					<label for="priority Order" class="control-label" style="margin-top: 20px;">Priority Order:</label>
					<input type="number" name="priorityOrder" id="priorityOrder" value="{{$collectionitem->priority_order}}" min="0"/>
					<button style="margin-top: 20px" type="submit" class="btn btn-success btn-block"> Update </button>
				</form>
			</div>
		</div>
	</section>
	<div class="bottom-line">
	</div>
@endsection
