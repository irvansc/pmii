<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderSection extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImgAttribute($value)
    {
        if ($value) {
            return asset('storage/'.$value);
           }else {
            return asset('/back/img/hero-img2.png');
           }

    }
}
