@extends('layouts.master')
@section('title', "Contact")
@section('meta-description', "Contact Red Cubez for any questions or comments you may have about our company's services,
our products, careers or in general about design skill, innovation design ideas, website development, custom software development, or software development process.")
@section('site_url', "http://www.mecartworks.com/contact")

@section('content')
<main class="background-main img-background-repeat">
    <section class="img-background-repeat">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row main img-background-repeat">
                        <div class="col-xs-12 colo-sm-12">
                            <h1 class="text-center">
                                
                                    @if(isset($collectionItem)||isset($pixelImage))GET A PRICE QUOTE
                                    @elseif(isset($newCustomProject))
                                        NEW CUSTOM PROJECT
                                    @else
                                        CONTACT US
                                    @endif
                                 
                            </h1>
                            <p class="text-center">
                                At MEC, it is our top priority to respond to your questions.
                                Please fill in the ‘Message’ section in as much detail as you prefer. You can also
                                benefit from the free consultation we offer for your design necessities! Let's talk
                                about your needs and how MEC can work with you to provide the perfect
                                design solution! We promise to get back to you in maximum 12 hours.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="font-Lucida">
        <div class="container">
            <div class="row contact-row">
                <div class="col-xs-12 col-sm-12 ">
                    <form action="{{url('contact') }}" class="form-horizontal" id="contactForm" method="POST" name="contactForm" role="form">
                        {{ csrf_field() }}
                        <input name="timeStamp" type="hidden" value="{{$timeStamp}}">
                        </input>
                    </form>
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 col-md-offset-1">
                            <div class="form-group">
                                <label for="name">
                                    FIRST NAME*
                                </label>
                                <input autofocus="" class="form-control" form="contactForm" id="firstName" name="firstName" required="" type="text">
                                </input>
                            </div>
                            <br>
                                <small class="text-danger">
                                    {{ $errors->first('firstName') }}
                                </small>
                            </br>
                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="name">
                                    LAST NAME
                                </label>
                                <input autofocus="" class="form-control" form="contactForm" id="lastName" name="lastName" type="text">
                                    <br>
                                        <small class="text-danger">
                                            {{ $errors->first('lastName') }}
                                        </small>
                                    </br>
                                </input>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12 col-md-offset-1">
                            <div class="form-group">
                                <label for="email">
                                    EMAIL*
                                </label>
                                <input autofocus="" class="form-control " form="contactForm" id="email" name="email" required="" type="email">
                                    <br>
                                        <small class="text-danger">
                                            {{ $errors->first('email') }}
                                        </small>
                                    </br>
                                </input>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12 col-md-offset-0">
                            <div class="form-group">
                                <label for="country">
                                    COUNTRY
                                </label>
                                <input autofocus="" class="form-control" form="contactForm" name="country" type="text">
                                    <br>
                                        <small class="text-danger">
                                            {{ $errors->first('country') }}
                                        </small>
                                    </br>
                                </input>
                            </div>
                        </div>
                        @if(isset($collectionItem) || isset($newCustomProject) || isset($pixelImage))
                        <div class="col-md-5 col-sm-12 col-xs-12 col-md-offset-1">
                            <div class="form-group">
                                <label for="country">
                                    PHONE
                                </label>
                                <input autofocus="" class="form-control" form="contactForm" name="phone" type="text">
                                    <br>
                                    </br>
                                </input>
                            </div>
                        </div>
                        @endif
                                @if(isset($newCustomProject))
                        <input form="contactForm" name="newCustomProject" type="hidden" value="true">
                            @endif
                                @if(isset($collectionItem) || isset($newCustomProject) || isset($pixelImage))
                            <div class="col-md-5 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="country">
                                        CUSTOMER TYPE*
                                    </label>
                                    <select autofocus="" class="form-control" form="contactForm" name="customerType" required="">
                                        <option value="">
                                        </option>
                                        <option value="homeOwner">
                                            Home Owner
                                        </option>
                                        <option value="interiorDesigner">
                                            Interior Designer
                                        </option>
                                        <option value="contractor">
                                            Contractor
                                        </option>
                                        <option value="architect">
                                            Architect
                                        </option>
                                        <option value="dealer">
                                            Dealer
                                        </option>
                                        <option value="other">
                                            Other
                                        </option>
                                    </select>
                                    <br>
                                    </br>
                                </div>
                            </div>
                            @endif
                            <div class="col-sm-10 col-xs-12 col-sm-offset-1 col-md-offset-1 col-md-10 ">
                                <div class="form-group">
                                    <label for="upload">
                                        UPLOAD IMAGES & FILES
                                    </label>
                                </div>
                                <div class="background-main" style="margin-bottom: 30px;">
                                    <div class="image_upload_div">
                                        <form action="{{url('contact/uploadFiles') }}" class="dropzone">
                                            {{ csrf_field() }}
                                                {{ method_field('POST') }}
                                            <input name="timeStamp" type="hidden" value="{{$timeStamp}}">
                                            </input>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if(isset($collectionItem))
                                    @include('collectionitem.showCollectionItemForPriceQuote')
                                @endif
                                @if(isset($pixelImage))
                                  @include('pixelitem.showPixelImageForPriceQuote')
                                @endif
                            <div class="col-sm-10 col-xs-12 col-sm-offset-1 col-md-offset-1 col-md-10">
                                <div class="form-group" >
                                    <label for="messageBody">
                                        MESSAGE & PROJECT DESCRIPTION
                                    </label>
                                    <textarea autofocus="" class="form-control" form="contactForm" id="messageBody" name="messageBody" required="required" rows="12">
                                    </textarea>
                                    <br>
                                        <small class="text-danger">
                                            {{ $errors->first('messageBody') }}
                                        </small>
                                    </br>
                                </div>
                            </div>
                            <div class="col-sm-9 col-xs-12 col-sm-offset-1 col-md-9 col-md-offset-1 ">
                                <label class="checkbox-subscribe">
                                    <input form="contactForm" id="subscribe" name="subscribe" type="checkbox" value="true">
                                        Yes, I want to recieve the latest updates. Subscribe me to the Newsletter.
                                    </input>
                                </label>
                                <div class="form-group pull-right">
                                    <input class="btn-submit upload-btn" form="contactForm" type="submit" value="Send">
                                    </input>
                                </div>
                            </div>
                        </input>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<section class="background-main img-background-repeat">
    <div class="container">
        <div class="col-md-12 col-md-offset-1  col-sm-12 col-xs-11 col-xs-offset-1">
            <div class="map">
                <div style="">
                    <div style="height:750px; border:2px solid #eee; display:inline-block; overflow:hidden; ">
                        <iframe height="750" src="https://www.google.com/maps/d/embed?mid=14gYdKHgNbIyIkUKScF0T1G84dqs" style="position:relative; top:-50px; border:none;" width="1000px">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="background-main contact-address img-background-repeat">
    <div class="container">
        <div class="main">
            <div class="col-md-4 ">
                <h4 class="text-center">
                    Middle Eastern Office
                </h4>
                <address class="text-center">
                    Suite 2204, 22nd Floor Single Business Tower Sheikh Zayed Road, Emirates Holidays
                    <br>
                        Dubai,
                        UAE
                        <br>
                            <a href="mailto:exports@mecartworks.com">
                                exports@mecartworks.com
                            </a>
                        </br>
                    </br>
                </address>
            </div>
            <div class="col-md-4">
                <h4 class="text-center">
                    Asian Office
                </h4>
                <address class="text-center">
                    36 Lawrence Road
                    <br>
                        Lahore, Pakistan 54000
                        <br>
                            <a href="tel:+924236366666">
                                (+92) 42-36366666
                            </a>
                            <br>
                                <a href="mailto:design@mecartworks.com">
                                    design@mecartworks.com
                                </a>
                            </br>
                        </br>
                    </br>
                </address>
            </div>
            <div class="col-md-4">
                <h4 class="text-center">
                    North American Office
                </h4>
                <address class="text-center">
                    650 Highglen Avenue
                    <br>
                        Markham, Ontario, Canada L3S 4P6
                        <br>
                            <a href="tel:+16477723189">
                                (+1) 647-772-3189
                            </a>
                            <br>
                                <a href="mailto: info@mecartworks.com">
                                    info@mecartworks.com
                                </a>
                            </br>
                        </br>
                    </br>
                </address>
            </div>
        </div>
    </div>
</section>
<div class="bottom-line">
</div>
@endsection
@section('pageSpecificScripts')
<link href="{{ asset('css/fileUpload/dropzone.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ URL::asset('js/fileUpload/dropzone.js')}}" type="text/javascript">
    </script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet" type="text/css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js">
    </script>
    <script type="text/javascript">
        function validateForm() {
            if ($("#contactForm").valid()) {
                if ($("#attachment").val() == null || $("#attachment").val() == '') {
                    $("#contactForm").submit();
                }
                else {
                    var attachment = $("#attachment").val();
                    var extension = getFileExtension(attachment);
                    var isFileAllow = checkFileExtenion(extension);
                    if (isFileAllow) {
                        $("#uploadHtmlDiv").remove();
                        $("#contactForm").valid();
                        $("#contactForm").submit();
                    }
                    else {
                        $("#uploadHtmlDiv").remove();
                        $("#uploadDiv").before("<div id='uploadHtmlDiv'><h2>Upload an Image or Documet</h2></div>");
                    }
                }
            }
        }
        function getFileExtension(attachment) {
            var extension = attachment.substr((attachment.lastIndexOf('.') + 1));
            return extension;
        }
        function checkFileExtenion(extension) {

            if (extension == "xlsx" || extension == 'xls' || extension == 'jpg' ||
                extension == 'jpeg' || extension == 'doc' || extension == 'pdf' || extension == 'docx') {
                return true;
            }
            else
                return false;
        }
    </script>
    <script type="text/javascript">
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    @endsection
