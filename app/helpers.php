<?php

use App\Models\Logo;
use App\Models\Post;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Models\SubCategory;
use App\Models\HeaderSection;
use Illuminate\Support\Carbon;

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
if (!function_exists('webHome')) {
    function webHome()
    {
        return HeaderSection::find(1);
    }
}

if (!function_exists('lates_home_3post')) {
    function lates_home_3post()
    {
        return Post::where('isActive', 1)
        ->with('author', 'subcategory')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
    }
}
if (!function_exists('lates_home_5post')) {
    function lates_home_5post()
    {
        return Post::where('isActive', 1)
            ->with('author', 'subcategory')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    }
}

if (!function_exists('words')) {
    function words($value, $words = 15, $end = "...")
    {
        return Str::words(strip_tags($value), $words, $end);
    }
}
// date format
if (!function_exists('date_formatter')) {
    function date_formatter($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->isoFormat('LL');
    }
}


if (!function_exists('readDuration')) {
    function readDuration(...$text)
    {
        Str::macro('timeCounter', function ($text) {
            $totalWords = str_word_count(implode(" ", $text));
            $minutesToRead = round($totalWords / 200);
            return (int)max(1, $minutesToRead);
        });
        return Str::timeCounter($text);
    }
}
if (!function_exists('categories')) {
    function categories()
    {
        return SubCategory::whereHas('posts')
            ->with('posts', function($q){
                $q->where('isActive', '=', 1);
            })
            ->orderBy('subcategory_name', 'asc')
            ->get();
    }
}
// tags
if (!function_exists('all_tags')) {
    function all_tags($except = null, $limit = null)
    {
        $tags = Post::whereNotNull('post_tags')
                    ->pluck('post_tags')
                    ->toArray();

        $allTags = [];

        foreach ($tags as $tagList) {
            $splitTags = explode(',', $tagList);
            foreach ($splitTags as $tag) {
                $allTags[] = trim($tag);
            }
        }

        $uniqueTags = array_unique($allTags);

        if (!is_null($except)) {
            $uniqueTags = array_diff($uniqueTags, (array) $except);
        }

        if (!is_null($limit)) {
            $uniqueTags = array_slice($uniqueTags, 0, $limit);
        }

        return $uniqueTags;
    }
}
if (!function_exists('recommended_post')) {
    function recommended_post()
    {
        return Post::where('isActive','=', 1)->with('author')
            ->with('subcategory')
            ->limit(4)
            ->inRandomOrder()
            ->get();
    }
}

if (!function_exists('single_latest_post')) {
    function single_latest_post()
    {
        return Post::where('isActive','=', 1)->with('author')
            ->with('subcategory')
            ->limit(1)
            ->orderBy('created_at', 'desc')
            ->first();
    }
}
