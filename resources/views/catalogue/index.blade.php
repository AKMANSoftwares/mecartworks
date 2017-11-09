@extends('layouts.master')
@section('title', "| View Collections")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <section class="background-main hero">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>All Catalogues</h1>
                <hr>
            </div>
            <div class="col-md-2 col-md-pull-4" style="margin-top: 30px;">
                <a href="{{  url('admin/catalogue/create') }}" class="btn btn-primary btn-block">Create new
                    Catalogue</a>
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
                    <th>Description</th>
                    <th>Catalogue Link</th>
                    <th>Priority Order</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($catalogues as $catalogue)
                        <tr>
                            <th> {{ $catalogue->id }} </th>
                            <td> {{ $catalogue->name }} </td>
                            <td> {{ substr(strip_tags($catalogue->description), 0, 50) }} {{ strlen(strip_tags($catalogue->description)) > 50 ? "..." : '' }} </td>
                            <td> {{$catalogue->catalogue_link }} </td>
                            <td> {{ $catalogue->priority_order }} </td>
                            <td><a href="{{ url('admin/catalogue/'.$catalogue->id) }} "
                                   class="btn btn-default btn-sm"">View</a>
                                <a href="{{  url('admin/catalogue/'.$catalogue->id.'/edit') }}"
                                   class="btn btn-default btn-sm"">Edit</a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 col-md-offset-5">
                {!! $catalogues->links() !!}
            </div>
        </div>
    </section>
@endsection
