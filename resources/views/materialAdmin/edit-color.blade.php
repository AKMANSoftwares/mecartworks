
@extends('layouts.master')
@section('title', "Material-Create-Color")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')

<section class="background-main hero">
	<div class="container">
	<div class="row" style="margin-top:50px;">
		<br class="col-md-8 col-md-offset-2">
			<h1>Edit Material Color</h1>
			<hr>
		<br>
		<h3>Previously selected Images</h3>
		@foreach($previouslyselectedimages as $previouslyselectedimage)
			<img src="{{ asset('images/materials/colors/'. $previouslyselectedimage->image) }}" height="100" width="100" alt="{{ $previouslyselectedimage->image }}"/>
		@endforeach
		<br>
    	{!! Form::open(array('action' => 'MaterialAdminController@updateColor', 'files'=>true, 'method'=>'post' , 'id'=>'colorform', 'class'=>'colorform' , 'onsubmit'=>'return validate()')) !!}
			{{Form::hidden('materialid',$materialid) }}
		 @if(isset($colorid))
        @foreach ($colorid as $ids)
          @foreach ($ids as $key=>$id)
					{{ Form::label('image[]',$id.':') }}
					{{ Form::file ( 'image[]',['class'=>'image', 'onerror'=>"if (this.src == '') this.src = 'http://mecsite.app/images/fjords.jpg';"])}}

					{{Form::hidden('colorid[]',$key) }}
          @endforeach
        @endforeach
      @endif

			{{ Form::label('default', 'Default Image:') }}
			{{ Form::file('default' , ['class'=>'default']) }}
			{{ Form::submit("Update", array('class' => "btn btn-success btn-lg btn btn-block" , 'style'=> "margin-top:20px; margin-bottom:20px;")) }}
			{!! Form::close() !!}

			</div>
	</div>

</section>
@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
 <script src="http://malsup.github.com/jquery.form.js"></script>
<script>
function validate(){
	var inputs = $(".image");
	var def = $(".default");


	for(var i = 0; i < inputs.length; i++){
	 //   alert($(inputs[i]).val());
			if($(inputs[i]).val() == '')
			{
				inputs[i] = def;
				var input = $("<input>")
			               .attr("type", "hidden")
			               .attr("name", "image[]").val(def);
			 $('#colorform').append($(input));

			}

 	}


}
</script> --}}
