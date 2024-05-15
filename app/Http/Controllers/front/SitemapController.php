<?php

namespace App\Http\Controllers\front;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [
            ['loc' => URL::to('/'), 'priority' => '1.00'],
            ['loc' => URL::to('/article'), 'priority' => '0.80'],
            ['loc' => URL::to('/galery'), 'priority' => '0.80'],
            ['loc' => URL::to('/file'), 'priority' => '0.80'],
            ['loc' => URL::to('/contact'), 'priority' => '0.80'],
            ['loc' => URL::to('/team'), 'priority' => '0.80'],
            ['loc' => URL::to('/anggota'), 'priority' => '0.80'],
            ['loc' => URL::to('/alumni'), 'priority' => '0.80'],
            ['loc' => URL::to('/pendaftaran/anggota'), 'priority' => '0.80'],
            ['loc' => URL::to('/pendaftaran/alumni'), 'priority' => '0.80'],
            // Tambahkan URL dinamis jika ada
        ];

        $articles = Post::all();
        foreach ($articles as $article) {
            $urls[] = ['loc' => URL::to("/article/{$article->slug}"), 'priority' => '0.60'];
        }
        $categories = Category::all();
        foreach ($categories as $category) {
            $urls[] = ['loc' => URL::to("/category/{$category->slug}"), 'priority' => '0.60'];
        }

        return response()->view('sitemap', compact('urls'))->header('Content-Type', 'text/xml');
    }
}
