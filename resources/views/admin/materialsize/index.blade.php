@extends('layouts.master')

@section('title', "| View Material-Sizes")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>All Material Sizes</h1>
				<hr>
			</div>
			<div class="col-md-2 col-md-pull-4" style="margin-top: 30px;">
				<a href="{{  route('material-size.create') }}" class="btn btn-primary btn-block">Create new Material Size</a>
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
					<th>Size</th>
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($sizes as $size)
					<tr>
						<th> {{ $size->id }} </th>
						<td> {{ $size->size }} </td>
						<td> {{ date('M j, Y h:ia', strtotime($size->created_at)) }} </td>
						<td> <a href="{{ route('material-size.show', $size->id) }} " class="btn btn-default btn-sm"">View</a><a href="{{  route('material-size.edit' , $size->id) }}" class="btn btn-default btn-sm"">Edit</a> </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4 col-md-offset-5">
			{{-- {!! $colors->links() !!} --}}
		</div>
	</div>
</section>
@endsection
