<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Post extends Model implements Viewable, HasMedia
{
    use HasFactory;
    use InteractsWithViews;
    use HasFactory;
    use Sluggable;
    use InteractsWithMedia;
    protected $guarded =[];
    protected $removeViewsOnDelete = true;

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('resized')
              ->width(500)
              ->height(150)
              ->keepOriginalImageFormat()
              ->performOnCollections('post_content')
              ->nonQueued(); // Tambahkan ini jika Anda ingin proses conversion dilakukan secara synchronous
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'post_title'
            ]
        ];
    }

     public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('post_title','like',$term);
        });
    }

    public function subcategory() {
        return $this->belongsTo(SubCategory::class,'category_id','id');
    }
    public function author() {
        return $this->belongsTo(User::class,'author_id','id');
    }


    public function getFeatured_imageAttribute($value)
    {
       if ($value) {
        return asset('back/dist/img/default/'.$value);
       }else {
        return asset('back/dist/img/default/example.jpg');
       }
    }
}
