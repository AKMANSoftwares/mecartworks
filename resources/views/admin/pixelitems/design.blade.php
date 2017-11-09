@extends('layouts.master')

@section('title', "| View Pixel-Colors")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>All Pixel Designs</h1>
				<hr>
			</div>
			<div class="col-md-2 col-md-pull-4" style="margin-top: 30px;">
				<a href="{{  route('admin.pixelitem.create.design') }}" class="btn btn-primary btn-block">Create new Pixel Design</a>
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
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($designs as $design)
					<tr>
						<th> {{ $design->id }} </th>
						<td> {{ $design->name }} </td>
						<td> {{ date('M j, Y h:ia', strtotime($design->created_at)) }} </td>
						<td> <a href="{{ route('admin.pixelitem.show.design', $design->id) }} " class="btn btn-default btn-sm"">View</a><a href="{{  route('admin.pixelitem.edit.design' , $design->id) }}" class="btn btn-default btn-sm"">Edit</a> </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4 col-md-offset-5">
			{!! $designs->links() !!}
		</div>
	</div>
</section>
@endsection
