@extends('layouts.master')
@section('title', "Career-Edit")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero" id="create-pixel">
    @if(count($errors)>0)
    <div class="col-md-12 pull-left">
        <div class="form-group ">
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>
                Edit Career
            </h1>
            <hr/>
            <form accept-charset="UTF-8" action="{{ URL('admin/careers/'.$career->id) }}" class="form-horizontal" enctype="multipart/form-data" id="catalogueForm" method="POST">
                {{ csrf_field() }}
                    {{method_field('PUT')}}
                <label class="control-label" for="title" style="margin-top: 20px;">
                    Title:
                </label>
                <input class="form-control" id="title" name="title" required="" type="text" value="{{$career->title}}"/>
                {{ Form::label('body', "Description:") }}
               {{ Form::textarea('body', $career->description , array('class' => 'form-control', 'id'=>'body')) }}
                <label class="control-label" for="isActive" style="margin-top: 20px;">
                    Is Active:
                </label>
                <input id="isActive" name="isActive"  type="checkbox" @if($career->isActive==1) checked @endif/>
                <br/>
                <label class="control-label" for="slug" style="margin-top: 20px;">
                    Slug:
                </label>
                <input class="form-control" id="slug" name="slug" required="" type="text" value="{{$career->slug}}"/>
                <label class="control-label" for="priorityOrder" style="margin-top: 20px;">
                    Priority Order:
                </label>
                <input id="priorityOrder" min="0" name="priorityOrder" required="" type="number" value="{{$career->priority_order}}"/>
                <button class="btn btn-success btn-block" style="margin-top: 20px" type="submit">
                    Update Career
                </button>
            </form>
        </div>
    </div>
</section>
<div class="bottom-line">
</div>
@endsection
@section('pageSpecificScripts')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
  $('#body').summernote();
});
    </script>
    @endsection
</link>