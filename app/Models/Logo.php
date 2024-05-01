<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getLogoUtamaAttribute($value)
    {
       if ($value) {
        return asset('/back/dist/img/logo/'.$value);
       }else {
        return asset('/back/dist/img/direktori/logo.png');
       }
    }
    public function getLogoEmailAttribute($value)
    {
       if ($value) {
        return asset('/back/dist/img/logo/'.$value);
       }else {
        return asset('/back/dist/img/direktori/logo-email.png');
       }
    }
    public function getLogoFaviconAttribute($value)
    {
       if ($value) {
        return asset('/back/dist/img/logo/'.$value);
       }else {
        return asset('/back/dist/img/direktori/favicon.ico');
       }
    }
}
