@extends('layouts.master')
@section('title', "Catalogues| MEC")
@section('meta-description', "Catalogues")
@section('site_url', "http://www.mecartworks.com/catalogues")
@section('content')
    <main class="background-main img-background-repeat">
        <section id="catalog-heading" class="img-background-repeat">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12  ">
                        <h1>Catalogs</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="catalog-section">
            <div class="container-fluid pad20">
                <div class="row ">
                    @foreach($catalogues as $catalogue)
                        <div id="imageDiv" class="col-md-4 col-sm-12 col-xs-12 col-xss-12 ">
                        <div class="classwithpad">
                            <input type="hidden" name="catalogueLink" id="catalogueLinkId"
                                   value="{{$catalogue->catalogue_link}}">
                            <h3 class="text-center">{{$catalogue->name}}</h3>
                            <div onclick="openCatalogueLink('{{$catalogue->catalogue_link}}');"
                                 class=" imageDivClass">
                                <div class="product-img-container hover20">
                                    <img src="{{asset('images/catalogues/'.$catalogue->image)}}"
                                         width="480px" height="520px" alt="{{ $catalogue->image }}">
                                </div>
                                <a id="link" href="#" class="">
                                </a>
                            </div>
                            <p class="text-left" style="height:150px ">{{$catalogue->description}}</p>
                            <button onclick="openCatalogueLink('{{$catalogue->catalogue_link}}');"
                                    class="btn-dis imageDivClass">Discover the catalogs
                            </button>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-4 col-md-offset-5">
                        {!! $catalogues->links() !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <button type="button" class="btnModalclose" data-dismiss="modal" aria-label="Close"><span  aria-hidden="true">&times;</span></button>
                    {{--<button type="button" class="close btn-modal"  data-dismiss="modal">&times;</button>--}}
                    <div class="modal-body">
                        <section id="pop-section">
                            <div class="popup-section">
                                <div class=" popup-border">
                                    <h1 class="title text-center mobileDoNotDisplay">Exclusive Collection</h1>
                                    <p class="intro text-center mobileDoNotDisplay">At MEC, it is our top priority to respond to your
                                        questions. Your are
                                        kindly requested to fill in the 'Message' section
                                        in as much detail as you prefer. You can also benefit the free consultation</p>

                                    <h3>Sign up for Our Exclusive Collection</h3>
                                    <div class="form-padding">
                                        <form name="signUpForm" id="signUpForm" role="form">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="row">
                                                <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 col-sm-offset-0 col-xs-offset-0">
                                                    <div class="row">
                                                        <div class=" col-sm-12 col-md-6 col-xs-12 form-group">
                                                            <label for="fname" class="sr-only">First Name</label>
                                                            <input type="text" name="firstName" id="firstName"
                                                                   class="form-control" placeholder="First Name"
                                                                   required>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-xs-12 form-group">
                                                            <label for="lname" class="sr-only">Last Name</label>
                                                            <input type="text" name="lastName" id="lastName"
                                                                   class="form-control"
                                                                   placeholder="Last Name" required>

                                                        </div>
                                                        <div class=" col-sm-12 col-md-6 col-xs-12 form-group">
                                                            <label for="cemail" class="sr-only">Email address</label>
                                                            <input type="email" name="email" id="email"
                                                                   class="form-control"
                                                                   placeholder="Email address" required>

                                                        </div>
                                                        <div class=" col-sm-12 col-md-6 col-xs-12 form-group">
                                                            <select class="form-control" name="profession"
                                                                    id="profession" autofocus
                                                                    required>
                                                                <option value="">I am a</option>
                                                                <option value="homeOwner">Home Owner</option>
                                                                <option value="interiorDesigner">Interior Designer
                                                                </option>
                                                                <option value="contractor">Contractor</option>
                                                                <option value="architect">Architect</option>
                                                                <option value="dealer">Dealer</option>
                                                                <option value="other">Other</option>
                                                            </select>

                                                        </div>
                                                        <input type="hidden" name="catalogueLink" id="catalogueLink"
                                                               value="">
                                                        <div class="col-md-6 col-sm-6 col-md-offset-3 col-xs-12">
                                                            <button type="button"
                                                                    onclick="submitSignUpCatalogueForm(this.form.catalogueLink.value);"
                                                                    class="btn-pop"> DISCOVER THE CATALOGS
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <div class="bottom-line"></div>
@endsection
@section('pageSpecificScripts')
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js"
            type="text/javascript"></script>
    <script type="text/javascript">
        function openCatalogueLink(catalogueLink) {
            $.ajax({
                type: 'GET',
                url: '/catalogues/getcookies/',
                success: function (data) {
                    if (data.signUpCatlogueFormCookie == 'true') {
                        //alert("cookie already set");
                        window.open(catalogueLink, '_blank');
                    }
                    else {
                        $('#myModal').modal('show');
                        $("#firstName").val(null);
                        $("#lastName").val(null);
                        $("#email").val(null);
                        $("#type").val(null);
                        $("#catalogueLink").val(null);
                        $("#catalogueLink").val(catalogueLink);
                    }
                },
                error: function () {
                    alert("Bad submit store/update");
                }
            });
        }

        function submitSignUpCatalogueForm(catalogueLink) {
            var form = $("#signUpForm");

            if (form.valid()) {
                $('#myModal').modal("toggle");
                window.open(catalogueLink, '_blank');
                ///////////set cookies and submit form
                $.ajax({
                    type: 'POST',
                    url: '/catalogues/setcookies/',
                    data: form.serialize(),
                    success: function (data) {
                    },
                    error: function () {
                        alert("Bad submit");
                    }
                });
            }
        }


    </script>
@endsection
