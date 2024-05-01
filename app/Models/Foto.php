<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $guarded = [''];
    public function Album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }


    public function scopeSearch($query, $value)
    {
        $query->where('title', 'LIKE', "%$value%");
    }
}
