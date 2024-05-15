<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;
    use Loggable;
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPictureAttribute($value)
    {
       if ($value) {
        return asset('/back/img/user/'.$value);
       }else {
        return asset('/back/img/user/person.png');
       }
    }
    // public function getTanggalLahirAttribute(){
    //     return Carbon::parse($this->attributes['tanggal_lahir'])
    //     ->translatedFormat('l, d F Y');
    // }
}
