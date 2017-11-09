@extends('layouts.master')

@section('title', "| View Material-Colors")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>All Material Colors</h1>
				<hr>
			</div>
			<div class="col-md-2 col-md-pull-4" style="margin-top: 30px;">
				<a href="{{  route('material-color.create') }}" class="btn btn-primary btn-block">Create new Material Color</a>
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
          <th>Color Code</th>
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($colors as $color)
					<tr>
            <th> <img src="{{ asset('images/materials/general_colors/'. $color->image) }}" width="50px" height="50px" /></th>
						<th> {{ $color->id }} </th>
						<td> {{ $color->name }} </td>
            <td> {{ $color->color_code }} </td>
						<td> {{ date('M j, Y h:ia', strtotime($color->created_at)) }} </td>
						<td> <a href="{{ route('material-color.show', $color->id) }} " class="btn btn-default btn-sm"">View</a><a href="{{  route('material-color.edit' , $color->id) }}" class="btn btn-default btn-sm"">Edit</a> </td>
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
