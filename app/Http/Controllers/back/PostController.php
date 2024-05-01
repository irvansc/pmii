<?php

namespace App\Http\Controllers\back;

use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function createPost(Request $request)
    {
        $request->validate([
            'post_title' => 'required|unique:posts,post_title',
            'post_content' => 'required',
            'post_category' => 'required|exists:sub_categories,id',
            'featured_image' => 'required|mimes:jpeg,png,jpg|max:1024'
        ],[
            'post_title.required'=> 'The title field is required',
            'post_title.unique'=> 'The title already exists',
            'post_content.required'=> 'The content field is required',
            'post_category.required'=> 'The category field is required',
            'post_category.exists'=> 'The category does not exist',
            'featured_image.required'=> 'The image field is required',
            'featured_image.mimes'=> 'The image must be a jpeg, png, or jpg',
            'featured_image.max'=> 'The image must be less than 1MB'
        ]);

        if ($request->hasFile('featured_image')) {
            $path = "images/post_images/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time() . '' . $filename;
            $upload = Storage::disk('public')->put($path . $new_filename, (string) file_get_contents($file));

            $post_thumbnails_path = $path . 'thumbnails';
            if (!Storage::disk('public')->exists($post_thumbnails_path)) {
                Storage::disk('public')->makeDirectory($post_thumbnails_path, 0755, true, true);
            }
            // create square thumbnails
            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->fit(200, 200)->save(storage_path('app/public/' . $path . 'thumbnails/' . 'thumb_' . $new_filename));
            // create resized image
            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->fit(500, 350)->save(storage_path('app/public/' . $path . 'thumbnails/' . 'resized_' . $new_filename));

            if ($upload) {
                $post = new Post();
                $post->author_id = auth()->id();
                $post->category_id = $request->post_category;
                $post->post_title = $request->post_title;
                // $post->slug = Str::slug($request->post_title);
                $post->post_content = $request->post_content;
                $post->featured_image = $new_filename;
                $post->post_tags = $request->post_tags;
                $post->isActive = $request->isActive;
                $post->meta_desc = $request->meta_desc;
                $post->meta_keywords = $request->meta_keywords;
                $saved = $post->save();
                if ($saved) {
                    return response()->json(['code' => 1, 'msg' => 'New Post has been successfuly created.']);
                } else {
                    return response()->json(['code' => 3, 'msg' => 'Something went wrong!']);
                }
            } else {
                return response()->json(['code' => 3, 'msg' => 'Something went wrong for uploading image.']);
            }
        }
    }

    public function contentImage(Request $request)
    {
        $post = new Post();
        $post->id = 0;
        $post->exists = true;
        $images = $post->addMediaFromRequest('upload')
            ->toMediaCollection('post_content');

        $resizedImageUrl = $images->getUrl('resized');

        return response()->json([
            'url' => $resizedImageUrl
        ]);
    }




    public function editPost(Request $request)
    {
        if (!request()->post_id) {
            return abort(404);
        } else {
            $post = Post::find(request()->post_id);
            $subCat = SubCategory::all(); //TAMBAH KAN BAGIAN INI
            $data = [
                'post' => $post,
                'subCat' => $subCat, //TAMBAH KAN BAGIAN INI
                'pageTitle' => 'Edit Post',
            ];
            return view('back.admin.pages.edit_post', $data);
        }
    }

    public function updatePost(Request $request)
    {
        if ($request->hasFile('featured_image')) {

            $request->validate([
                'post_title' => 'required|unique:posts,post_title,' . $request->post_id,
                'post_content' => 'required',
                'post_category' => 'required|exists:sub_categories,id',
                'featured_image' => 'required|mimes:jpeg,png,jpg|max:1024'
            ]);

            $path = "images/post_images/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time() . '' . $filename;
            $upload = Storage::disk('public')->put($path . $new_filename, (string) file_get_contents($file));

            $post_thumbnails_path = $path . 'thumbnails';
            if (!Storage::disk('public')->exists($post_thumbnails_path)) {
                Storage::disk('public')->makeDirectory($post_thumbnails_path, 0755, true, true);
            }
            // create square thumbnails
            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->fit(200, 200)->save(storage_path('app/public/' . $path . 'thumbnails/' . 'thumb_' . $new_filename));
            // create resized image
            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->fit(500, 350)->save(storage_path('app/public/' . $path . 'thumbnails/' . 'resized_' . $new_filename));

            if ($upload) {

                $old_post_image = Post::find($request->post_id)->featured_image;
                if ($old_post_image != null && Storage::disk('public')->exists($path . $old_post_image)) {
                    Storage::disk('public')->delete($path . $old_post_image);
                    if (Storage::disk('public')->exists($path . 'thumbnails/resized_' . $old_post_image)) {
                        Storage::disk('public')->delete($path . 'thumbnails/resized_' . $old_post_image);
                    }
                    if (Storage::disk('public')->exists($path . 'thumbnails/thumb_' . $old_post_image)) {
                        Storage::disk('public')->delete($path . 'thumbnails/thumb_' . $old_post_image);
                    }
                }

                $post = Post::find($request->post_id);
                $post->category_id = $request->post_category;
                $post->slug = null;
                $post->post_content = $request->post_content;
                $post->post_title = $request->post_title;
                $post->post_tags = $request->post_tags;
                $post->featured_image = $new_filename;
                $post->isActive = $request->isActive;
                $post->meta_desc = $request->meta_desc;
                $post->meta_keywords = $request->meta_keywords;
                $saved = $post->save();

                if ($saved) {
                    return response()->json(['code' => 1, 'msg' => 'Post has been successfuly updated.']);
                } else {
                    return response()->json(['code' => 3, 'msg' => 'Something went wrong, for updating post.']);
                }
            } else {
                return response()->json(['code' => 3, 'msg' => 'Error in uploading image.']);
            }
        } else {
            $request->validate([
                'post_title' => 'required|unique:posts,post_title,' . $request->post_id,
                'post_content' => 'required',
                'post_category' => 'required|exists:sub_categories,id'
            ]);

            $post = Post::find($request->post_id);
            $post->category_id = $request->post_category;
            $post->slug = null;
            $post->post_content = $request->post_content;
            $post->post_title = $request->post_title;
            $post->post_tags = $request->post_tags;
            $post->isActive = $request->isActive;
            $post->meta_desc = $request->meta_desc;
            $post->meta_keywords = $request->meta_keywords;
            $saved = $post->save();
            if ($saved) {
                return response()->json(['code' => 1, 'msg' => 'Post has been successfuly updated.']);
            } else {
                return response()->json(['code' => 3, 'msg' => 'Something went wrong, for updating post.']);
            }
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
