@extends('layouts.master')
@section('title', "| View Collections")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
    <section class="background-main hero">
        <div class="row" style="margin-top:50px;">
            <div class="col-md-8 col-md-offset-2">
                <h1>All Materials</h1>
                <hr>
            </div>
            <div class="col-md-2 col-md-pull-4" style="margin-top: 30px;">
                <a href="{{  url('admin/material/create') }}" class="btn btn-primary btn-block">Create new
                    Material</a>
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
                    <th>Slug</th>
                    <th>Priority Order</th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($materials as $material)
                        <tr>
                            <th> {{ $material->id }} </th>
                            <td> {{ $material->name }} </td>
                            <td> {{ substr(strip_tags($material->description), 0, 50) }} {{ strlen(strip_tags($material->description)) > 50 ? "..." : '' }} </td>
                            <td> {{$material->slug }} </td>
                            <td> {{ $material->priority_order }} </td>
                            <td><a href="{{ url('admin/material/viewmaterial/'.$material->id) }} "
                                   class="btn btn-default btn-sm"">View</a>
                                <a href="{{  url('admin/material/'.$material->id.'/edit') }}"
                                   class="btn btn-default btn-sm"">Edit</a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 col-md-offset-5">
                {!! $materials->links() !!}
            </div>
        </div>
    </section>
@endsection
