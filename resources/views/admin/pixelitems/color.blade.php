@extends('layouts.master')

@section('title', "| View Pixel-Colors")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>All Pixel Colors</h1>
				<hr>
			</div>
			<div class="col-md-2 col-md-pull-4" style="margin-top: 30px;">
				<a href="{{  route('admin.pixelitem.create.color') }}" class="btn btn-primary btn-block">Create new Pixel Color</a>
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
          <th>Image</th>
					<th>#</th>
					<th>Name</th>
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($pixelcolors as $pixelcolor)
					<tr>
            <th> <img src="{{ asset('images/pixel/colors/'. $pixelcolor->image) }}" width="50px" height="50px" /></th>
						<th> {{ $pixelcolor->id }} </th>
						<td> {{ $pixelcolor->name }} </td>
						<td> {{ date('M j, Y h:ia', strtotime($pixelcolor->created_at)) }} </td>
						<td> <a href="{{ route('admin.pixelitem.show.color', $pixelcolor->id) }} " class="btn btn-default btn-sm"">View</a><a href="{{  route('admin.pixelitem.edit.color' , $pixelcolor->id) }}" class="btn btn-default btn-sm"">Edit</a> </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4 col-md-offset-5">
			{!! $pixelcolors->links() !!}
		</div>
	</div>
</section>
@endsection
