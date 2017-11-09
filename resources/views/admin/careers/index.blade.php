@extends('layouts.master')
@section('title', "| Careers")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>All Careers</h1>
				<hr>
			</div>
			<div class="col-md-2 col-md-pull-4" style="margin-top: 30px;">
				<a href="{{  route('careers.create') }}" class="btn btn-primary btn-block">Create new Career</a>
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
		@if(count($careers)>0)
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Description</th>
					<th>Is Active</th>
					<th>Priority</th>
					<th>Slug</th>
					<th>Created At</th>
 					<th>Action</th>
				</thead>
				<tbody>
					@foreach($careers as $career)
					<tr>
						<th> {{ $career->id }} </th>
						<td> {{ $career->title }} </td>
                        <td> {{ substr(strip_tags($career->description), 0, 50) }} {{ strlen(strip_tags($career->description)) > 50 ? "..." : '' }} </td>
						<td>
						@if($career->isActive==1)
						Yes </td>
						@else
						No
						@endif
						<td> {{ $career->priority_order }} </td>
						<td> {{ $career->slug }} </td>
						<td> {{ date('M j, Y h:ia', strtotime($career->created_at)) }} </td>
						<td> <a href="{{ route('careers.show', $career->id) }} " class="btn btn-default btn-sm"">View</a><a href="{{  route('careers.edit' , $career->id) }}" class="btn btn-default btn-sm"">Edit</a> </td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
	No Record Found
	@endif
		</div>
		<div class="col-md-4 col-md-offset-5">
			{!! $careers->links() !!}
		</div>
	</div>

</section>
@endsection
