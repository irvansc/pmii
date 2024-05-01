<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function userOrganization()
    {
        return $this->hasMany(UserOrganization::class, 'jabatan_id');
    }

}
