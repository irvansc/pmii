<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'ordering'
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class,'parent_category','id');
    }
}
