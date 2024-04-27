<?php

use App\Models\Setting;

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
