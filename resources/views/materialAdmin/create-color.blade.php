
@extends('layouts.master')
@section('title', "Material-Create-Color")
@section('meta-description', "MEC Artworks")
@section('site_url', "http://www.mecartworks.com")
@section('content')
<section class="background-main hero">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Choose Material Color</h1>
			<hr>
    	{!! Form::open(array('action' => 'MaterialsController@color', 'files'=>true, 'method'=>'post' , 'id'=>'colorform', 'class'=>'colorform' , 'onsubmit'=>'return validate()')) !!}

		 @if(isset($colorid))
        @foreach ($colorid as $ids)
          @foreach ($ids as $key=>$id)
					{{ Form::label('image[]',$id.':') }}
					{{ Form::file ( 'image[]',['class'=>'image', 'onerror'=>"if (this.src == '') this.src = 'http://mecsite.app/images/fjords.jpg';"])}}
					{{Form::hidden('materialid',$materialid) }}
					{{Form::hidden('colorid[]',$key) }}
          @endforeach
        @endforeach
      @endif
			{{ Form::label('default', 'Default Image:') }}
			{{ Form::file('default' , ['class'=>'default']) }}
			{{ Form::submit("Save", array('class' => "btn btn-success btn-lg btn btn-block" , 'style'=> "margin-top:20px; margin-bottom:20px;")) }}
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
