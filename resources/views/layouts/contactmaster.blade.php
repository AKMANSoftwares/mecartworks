<?php
Request::url();
$current_url = url()->current();
$base_url = url('');
?>
@if (($current_url) != ($base_url."/contact"))
    <section class="background">
        <div class="container ">
            <div class="row row-master-contact text-center text-color-mehroon ">
                <div><h4><strong>Ready to Get Started&#63;</strong></h4></div>
                <div>
                    <strong><a href="/contact">Say Hello&#33;</a></strong>
                </div>
            </div>
        </div>
    </section>
@endif