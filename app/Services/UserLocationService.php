<?php

namespace Mec\Services;


use GeoIp2\Database\Reader;


class UserLocationService implements IUserLocationService
{

    public function getUserCountry()
    {

        $reader;

        // $compareTo= realpath('../mecsite/resources/redcubez/geocountry.mmdb');    

        if (\App::environment('production')) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
            $reader = new Reader('../mecsite/resources/redcubez/geocountry.mmdb');

        } else {
            $ipAddress = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
            $reader = new Reader('../resources/redcubez/GeoCountry.mmdb');
        }

        try {
            $countryRecord = $reader->country($ipAddress);
        } catch (\Exception $exception) {
            //New York Ip Address
            $countryRecord = $reader->country('161.185.161.173');
        }
        return $countryRecord->country;
    }
}