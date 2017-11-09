@extends('layouts.master')

@section('title', "| View Pixel-Items")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>All Pixel Items</h1>
				<hr>
			</div>
			<div class="col-md-2 col-md-pull-4" style="margin-top: 30px;">
				<a href="{{  route('admin.pixelitems.create') }}" class="btn btn-primary btn-block">Create new Pixel Item</a>
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
          <th>Featured Image</th>
					<th>#</th>
					<th>Title</th>
          <th>Catalogue Name</th>
					<th>Priority Order</th>
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($pixelitems as $pixelitem)
					<tr>
            <th> <img src="{{ asset('images/collectionitem/'. $pixelitem->featured_image) }}" width="50px" height="50px" /></th>
						<th> {{ $pixelitem->id }} </th>
						<td> {{ $pixelitem->title }} </td>
            <td> {{ $pixelitem->catalogue->name }} </td>
						<td> {{ $pixelitem->orderby }} </td>
						<td> {{ date('M j, Y h:ia', strtotime($pixelitem->created_at)) }} </td>
						<td> <a href="{{ route('admin.pixelitems.show', $pixelitem->id) }} " class="btn btn-default btn-sm"">View</a><a href="{{  route('admin.pixelitems.edit' , $pixelitem->id) }}" class="btn btn-default btn-sm"">Edit</a> </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4 col-md-offset-5">
			{!! $pixelitems->links() !!}
		</div>
	</div>
</section>
@endsection
