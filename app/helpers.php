<?php

use App\Models\Logo;
use App\Models\Setting;
use App\Models\SocialMedia;

// chek if user online have internet connection

if (!function_exists('isOnline')) {
    function isOnline($site = "https://www.youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}


if (!function_exists('webInfo')) {
    function webInfo()
    {
        return Setting::find(1);
    }
}
if (!function_exists('webLogo')) {
    function webLogo()
    {
        return Logo::find(1);
    }
}
if (!function_exists('webSosmed')) {
    function webSosmed()
    {
        return SocialMedia::find(1);
    }
}




