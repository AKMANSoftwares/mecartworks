<footer class="section-footer img-background-repeat">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 ">
                <div class="marginTo40">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 right-line">
                            <div id="testimonials">
                                <img alt="MEC Image" class="img-responsive" id="mec"
                                     src="{{ asset('images/footer/MEC.png') }}">
                                <div class="text-footer-global">
                                    MEC is one of the leading global producers of handcrafted
                                    custom
                                    mosaic art.We specialize in all things MOSAIC. Interior or exterior design, glass or
                                    marble tile, residential or commercial
                                    spaces, mosaic rugs or swimming pools we’ve got it all covered!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1 col-lg-5 col-lg-offset-1 col-sm-12 col-xs-12 ">
                            <div class="social-icons " id="links">
                                <a href="https://www.linkedin.com/" target="_blank">
                                    <i aria-hidden="true" class="fa fa-instagram ">
                                    </i>
                                </a>
                                <a href="https://twitter.com/" target="_blank">
                                    <i aria-hidden="true" class="fa fa-twitter ">
                                    </i>
                                </a>
                                <a href="https://plus.google.com/+Mecartworksmosaic" target="_blank">
                                    <i aria-hidden="true" class="fa fa-google-plus">
                                    </i>
                                </a>
                                <a href="https://www.facebook.com/mecarts" target="_blank">
                                    <i aria-hidden="true" class="fa fa-facebook ">
                                    </i>
                                </a>
                                <a href="https://www.houzz.com/pro/mecartworks" target="_blank">
                                    <i aria-hidden="true" class="fa fa-houzz ">
                                    </i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" id="footer-end-row">
                            <div class="">
                                <ul class="list-inline">
                                <li>
                                        <img alt="ISO-9001" class="img-responsive" id="iso"
                                             src="{{ asset('images/footer/iso-9001.png') }}"
                                             title="ISO-Logo-9001"/>
                                    </li>
                                    <li>
                                        <img alt="ISO-9002" class="img-responsive secondIso"  
                                             src="{{ asset('images/footer/iso-9002.png') }}"
                                             title="ISO-Logo-9002"/>
                                    </li>
                                    <li>
                                        <img alt="Best of Houzz 2014" class="img-responsive secondIso"  
                                             src="{{ asset('images/footer/houzz-2014.png') }}"
                                             title="Houzz_logo 2014"/>
                                    </li>
                                    <li>
                                        <img alt="Best of Houzz 2016" class="img-responsive secondIso"  
                                             src="{{ asset('images/footer/houzz-2016.png') }}"
                                             title="Houzz_logo 2016"/>
                                    </li>
                                    <li>
                                        <img alt="Best of Houzz 2017" class="img-responsive" id="lastIso"
                                             src="{{ asset('images/footer/houzz-2017.png') }}"
                                             title="Houzz_logo 2017"/>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div id="idea">
                                Want your idea to be transformed!
                            </div>
                            <div class="default-hover">
                                <a href="/contact">
                                    <button class="btnIcon btn-contactus" type="button">
                                        CONTACT US
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            @include('layouts.userLocation')
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                            <div id="firs-row-text-size">
                                Be the first to know about the exiting designs coming from MEC
                            </div>
                            <div class="margintop10">
                                <form id="stayConnectedForm" name="stayConnectedForm">
                                    {{ csrf_field() }}
                                    <div id="subscribeSection">
                                    </div>
                                    <div id="input-signup">
                                        <input class="email" id="email" name="email" placeholder="YOUR EMAIL"
                                               required="" type="email" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'YOUR EMAIL'">
                                        <span class="posRight" title="">
                                                <button class="btn-stay-connect" id="emailButton" name="emailButton"
                                                        onclick="subscribeUserToMailList()" type="button">
                                                    STAY CONNECTED
                                                </button>
                                            </span>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12" id="end-row">
        <div class=" pull-left" id="copy-right">
            © Copyright {{date("Y")}} - MEC Design. Designed by MEC Design.
        </div>
        <div class=" pull-right" id="condition">
            <a href="/documents/termsAndConditions.pdf" target="_blank">
                Standard Terms & Conditions
            </a>
        </div>
    </div>
</footer>
<link href="{{ asset('css/loader/loader.css') }}" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
    function subscribeUserToMailList() {
        var form = $("#stayConnectedForm");
        if (form[0].checkValidity()) {
            $("#subscribeSection").addClass("loader");
            $("#errorDiv").remove();
            $("#successDiv").remove();
            var email = $("#email").val();

            $.ajax({
                type: 'POST',
                url: '/welcome/contact/stayconnected',
                data: form.serialize(),
                success: function (data) {
                    $("#subscribeSection").removeClass("loader");
                    toastr.success(data.notification.message);

                    form[0].reset();

                },
                error: function () {
                    alert("Bad submit");
                }
            });
        }
        else {
            $("#errorDiv").remove();
            $("#successDiv").remove();
            var html = "<div id='errorDiv'>Please Enter Your Email</div>";
            $("#input-signup").after(html);

        }

    }

</script>
