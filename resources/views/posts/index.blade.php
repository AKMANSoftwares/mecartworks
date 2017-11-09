@extends('layouts.master')

@section('title', "| View Post")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>All Posts</h1>
				<hr>
			</div>
			<div class="col-md-2 col-md-pull-4" style="margin-top: 30px;">
				<a href="{{  route('posts.create') }}" class="btn btn-primary btn-block">Create new Post</a>
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
					<th>Title</th>
					<th>Body</th>
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<th> {{ $post->id }} </th>
						<td> {{ $post->title }} </td>
						<td> {{ substr(strip_tags($post->body), 0, 50) }} {{ strlen(strip_tags($post->body)) > 50 ? "..." : '' }} </td>
						<td> {{ date('M j, Y h:ia', strtotime($post->created_at)) }} </td>
						<td> <a href="{{ route('posts.show', $post->id) }} " class="btn btn-default btn-sm"">View</a><a href="{{  route('posts.edit' , $post->id) }}" class="btn btn-default btn-sm"">Edit</a> </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4 col-md-offset-5">
			{!! $posts->links() !!}
		</div>
	</div>
</section>
@endsection
