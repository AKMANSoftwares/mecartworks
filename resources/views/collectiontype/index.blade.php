@extends('layouts.master')
@section('title', "| View Collection Type")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero ">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>All Collection Types</h1>
				<hr>
			</div>
			<div class="col-md-2 col-md-pull-4" style="margin-top: 30px;">
				<a href="{{  route('collectiontype.create') }}" class="btn btn-primary btn-block">Create new Collection Type</a>
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
					<th>Name</th>
					<th>Image</th>
					<th>Priority Order</th>
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($collectiontypes as $collectiontype)
					<tr>
						<th> {{ $collectiontype->id }} </th>
						<td> {{ $collectiontype->name }} </td>
						<td> <img src="{{ asset('images/collectiontype/'. $collectiontype->image) }}" width="50px" height="50px" /></td>
						<td> {{$collectiontype->priority_order}}  </td>
						<td> {{ date('M j, Y h:ia', strtotime($collectiontype->created_at)) }} </td>
						<td> <a href="{{ route('collectiontype.show', $collectiontype->id) }} " class="btn btn-default btn-sm"">View</a><a href="{{  route('collectiontype.edit' , $collectiontype->id) }}" class="btn btn-default btn-sm"">Edit</a> </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4 col-md-offset-5">
			{!! $collectiontypes->links() !!}
		</div>
	</div>
</section>
@endsection
