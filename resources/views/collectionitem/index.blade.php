@extends('layouts.master')
@section('title', "| View Collection Item")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>All Collection Items</h1>
				<hr>
			</div>
			<div class="col-md-2 col-md-pull-4" style="margin-top: 30px;">
				<a href="{{  route('collectionitem.create') }}" class="btn btn-primary btn-block">Create new Collection Item</a>
			</div>
			<div class="col-md-2 col-md-pull-2" style="margin-top: -36px;">
					@if(Auth::check())
					<a class="btn btn-danger btn-block" href="{{ url('/logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					Logout
					</a>
					<form id="logout-form"
					action="{{ url('/logout') }}"
					method="POST"
					style="display: none;">
					{{ csrf_field() }}
					</form>
					@endif
			</div>
		</div>
	</div>
	<div class="row " style="margin-top: 50px;">
		<div class="col-md-8 col-md-offset-2">
			<table class="table">
				<thead>
					<th>#</th>
          <th>Code #</th>
					<th>Title</th>
          <th>Catalogue Name</th>
					<th>Description</th>
          <th>Collection-CollectionType Id</th>
          <th>Priority Order</th>
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($collectionitems as $collectionitem)
					<tr>
						<th> {{ $collectionitem->id }} </th>
            <th> {{ $collectionitem->code_number }} </th>
						<td> {{ $collectionitem->title }} </td>
            <td> {{ $collectionitem->catalogue['name'] }} </td>
						<td> {{ substr(strip_tags($collectionitem->description), 0, 50) }} {{ strlen(strip_tags($collectionitem->description)) > 50 ? "..." : '' }} </td>
            <td> {{ $collectionitem->col_coltype_id }} </td>
            <td> {{ $collectionitem->priority_order }} </td>
						<td> {{ date('M j, Y h:ia', strtotime($collectionitem->created_at)) }} </td>
						<td> <a href="{{ route('collectionitem.show', $collectionitem->id) }} " class="btn btn-default btn-sm">View</a>
							<a href="{{  route('collectionitem.edit' , $collectionitem->id) }}" class="btn btn-default btn-sm">Edit</a> </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4 col-md-offset-5">
			{!! $collectionitems->links() !!}
		</div>
	</div>
</section>
@endsection
