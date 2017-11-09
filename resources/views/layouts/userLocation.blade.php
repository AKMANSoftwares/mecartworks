@inject('locationService', 'Mec\Services\UserLocationService')


<div class="col-sm-8">
    <div id="country">
        We Ship to {{$locationService->getUserCountry()->name }}<span> <img
                    src="{{ asset('images/countryFlags/'. strtolower($locationService->getUserCountry()->isoCode) . '.png') }}"
                    class=" img-responsive" id="flag" alt="Flag"></span>
    </div>
</div>