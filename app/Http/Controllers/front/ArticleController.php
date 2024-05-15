<?php

namespace App\Http\Controllers\front;

use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLdMulti;

class ArticleController extends Controller
{
    public function categoryPost(Request $request, $slug)
    {
        if (!$slug) {
            return abort(404);
        } else {
            $subcategory = SubCategory::where('slug', $slug)->first();
            if (!$subcategory) {
                return abort(404);
            } else {
                $posts = Post::where('isActive', 1)
                    ->where('category_id', $subcategory->id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(2);

                // Mengambil related posts
                $related_post = Post::where('isActive', 1)
                    ->where('category_id', $subcategory->id)
                    ->whereNotIn('id', $posts->pluck('id'))
                    ->inRandomOrder()
                    ->take(3)
                    ->get();

                // Set SEO Meta Tags
                SEOMeta::setTitle($subcategory->subcategory_name);
                SEOMeta::setDescription('Explore posts in the ' . $subcategory->subcategory_name . ' category');
                SEOMeta::setCanonical(url('/category/' . $slug));

                OpenGraph::setTitle($subcategory->subcategory_name)
                    ->setDescription('Explore posts in the ' . $subcategory->subcategory_name . ' category')
                    ->setUrl(url('/category/' . $slug))
                    ->setType('website');

                JsonLdMulti::setTitle($subcategory->subcategory_name);
                JsonLdMulti::setDescription('Explore posts in the ' . $subcategory->subcategory_name . ' category');
                JsonLdMulti::setType('WebPage');

                $data = [
                    'pageTitle' => $subcategory->subcategory_name,
                    'category' => $subcategory,
                    'posts' => $posts,
                    'related_post' => $related_post,
                    'slug' => $slug
                ];
                return view('front.pages.category_posts', $data);
            }
        }
    }

    public function searchBlog(Request $request)
    {
        $query = request()->query('query');
if ($query && strlen($query) >= 2) {
    $searchValue = preg_split('/\s+/', $query, -1, PREG_SPLIT_NO_EMPTY);
    $posts = Post::query();

    // Menambahkan kondisi pencarian ke dalam query yang sama
    $posts->where(function ($q) use ($searchValue) {
        foreach ($searchValue as $value) {
            $q->orWhere('post_title', 'LIKE', "%{$value}%");
            $q->orWhere('post_tags', 'LIKE', "%{$value}%");
        }
    });

    // Menambahkan kondisi lain dan melakukan pagination pada query yang sama
    $posts = $posts->where('isActive', '=', 1)
        ->with('subcategory')
        ->with('author')
        ->orderBy('created_at', 'desc')
        ->paginate(6);

    // Mengambil related posts
    $related_posts = Post::where('isActive', 1)
        ->where(function ($q) use ($searchValue) {
            foreach ($searchValue as $value) {
                $q->orWhere('post_title', 'LIKE', "%{$value}%");
                $q->orWhere('post_tags', 'LIKE', "%{$value}%");
            }
        })
        ->whereNotIn('id', $posts->pluck('id')) // Pastikan tidak mengambil post yang sama dengan hasil utama
        ->inRandomOrder()
        ->take(3)
        ->get();

    $data = [
        'title' => 'Search for :: ' . request()->query('query'),
        'posts' => $posts,
        'related_post' => $related_posts // Menambahkan related posts ke data yang dikirim ke view
    ];

    return view('front.pages.search_posts', $data);
} else {
    // Menangani kasus di mana query tidak valid atau terlalu pendek
    return abort(404);
}
    }

    public function readPost($slug)
    {

        if (!$slug) {
            abort(404);
        } else {
            $posts = Post::where('slug', $slug)
                ->with('subcategory')
                ->with('author')
                ->first();

            if (!$posts) {
                return abort(404);
            }

            $posts_tags = explode(',', $posts->post_tags);
            $related_post = Post::where('id', '!=', $posts->id)
                ->where(function ($query) use ($posts_tags, $posts) {
                    foreach ($posts_tags as $item) {
                        $query->orWhere('post_tags', 'LIKE', "%$item%")
                            ->orWhere('post_title', 'LIKE', $posts->post_title);
                    }
                })
                ->inRandomOrder()
                ->take(3)
                ->get();
            $data = [
                'pageTitle' => Str::ucfirst($posts->post_title),
                'posts' => $posts,
                'related_post' => $related_post
            ];
            views($posts)->record();
            SEOMeta::setTitle($posts->post_title);
            SEOMeta::setDescription($posts->meta_desc);
            SEOMeta::addMeta('article:published_time', $posts->created_at->toW3CString(), 'property');
            SEOMeta::addMeta('article:section', $posts->subcategory->subcategory_name, 'property');
            SEOMeta::addKeyword($posts->meta_keywords);

            OpenGraph::setDescription($posts->meta_desc);
            OpenGraph::setTitle($posts->post_title);
            OpenGraph::setUrl('http://wksch-final.test/' . $posts->slug);
            OpenGraph::addProperty('type', 'article');
            OpenGraph::addProperty('locale', 'id-ID');
            OpenGraph::addProperty('locale:alternate', ['en-us']);

            JsonLdMulti::setTitle($posts->post_title);
            JsonLdMulti::setDescription($posts->meta_desc);
            JsonLdMulti::setType('Article');
            // JsonLdMulti::addImage($posts->featured_image->list('url'));
            if (!JsonLdMulti::isEmpty()) {
                JsonLdMulti::newJsonLd();
                JsonLdMulti::setType('WebPage');
                JsonLdMulti::setTitle('Page Article - ' . $posts->post_title);
            }
            OpenGraph::setTitle($posts->post_title)
                ->setDescription($posts->meta_desc)
                ->setType('article')
                ->setArticle([
                    'created_at' => 'datetime',
                    'updated_at' => 'datetime',
                    'expiration_time' => 'datetime',
                    'author' => $posts->author->name,
                    'section' => $posts->subcategory->subcategory_name,
                    'tag' => $posts->post_tags
                ]);
            return view('front.pages.single_post', $data);
        }
    }

    public function tagPost(Request $request, $tag)
    {
        $posts = Post::where('isActive', '=',  1)
            ->where('post_tags', 'LIKE', '%' . $tag . '%')
            ->with('subcategory', 'author')
            ->orderBy('created_at', 'desc')
            ->paginate(4);

        if ($posts->isEmpty()) {
            return abort(404);
        }

        // Mengambil related posts
        $related_post = Post::where('isActive', '=', 1)
            ->where('post_tags', 'LIKE', '%' . $tag . '%')
            ->whereNotIn('id', $posts->pluck('id')->toArray())
            ->inRandomOrder()
            ->take(3)
            ->get();

        // Set SEO Meta Tags
        SEOMeta::setTitle('Tag: ' . $tag);
        SEOMeta::setDescription('Explore posts tagged with ' . $tag);
        SEOMeta::setCanonical(url('/tag/' . $tag));

        OpenGraph::setTitle('Tag: ' . $tag)
            ->setDescription('Explore posts tagged with ' . $tag)
            ->setUrl(url('/tag/' . $tag))
            ->setType('website');

        JsonLdMulti::setTitle('Tag: ' . $tag);
        JsonLdMulti::setDescription('Explore posts tagged with ' . $tag);
        JsonLdMulti::setType('WebPage');

        $data = [
            'title' => $tag,
            'posts' => $posts,
            'related_post' => $related_post,
            'currentTag' => $tag
        ];

        return view('front.pages.tags_post', $data);
    }
}
