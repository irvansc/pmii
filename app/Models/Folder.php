<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFileSizeAttribute($value)
    {
        if ($value >= 1073741824) {
            $value = number_format($value / 1073741824, 2) . ' GB';
        } elseif ($value >= 1048576) {
            $value = number_format($value / 1048576, 2) . ' MB';
        } elseif ($value >= 1024) {
            $value = number_format($value / 1024, 2) . ' KB';
        } elseif ($value > 1) {
            $value = $value . ' value';
        } elseif ($value == 1) {
            $value = $value . ' byte';
        } else {
            $value = '0 value';
        }

        return $value;
    }
}
