<?php

namespace App\Http\Controllers\back;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('back.admin.pages.add-foto', [
            'albums' => $albums
        ]);
    }

    public function StoreFoto(Request $request)
    {

        if ($request->hasFile("img")) {
            foreach ($request->file('img') as $key => $file) {
                $path = "images/album/foto/";
                $filename = $file->getClientOriginalName();
                $new_filename = time() . '' . $filename;

                // Simpan file ukuran asli
                $upload = Storage::disk('public')->put($path . $new_filename, (string) file_get_contents($file));

                // Buat dan simpan thumbnail
                $post_thumbnails_path = $path . 'thumbnails';
                if (!Storage::disk('public')->exists($post_thumbnails_path)) {
                    Storage::disk('public')->makeDirectory($post_thumbnails_path, 0755, true, true);
                }
                // create square thumbnails
                Image::make(storage_path('app/public/' . $path . $new_filename))
                    ->fit(800, 600)->save(storage_path('app/public/' . $path . 'thumbnails/' . 'thumb_' . $new_filename));


                $insert[$key]['img'] = $new_filename;
                $insert[$key]['title'] = $filename;
                $insert[$key]['album_id'] = $request->album_id;
            }
            Foto::insert($insert);
        }
        return redirect()->route('setting.galery')->with(['success' => 'Foto berhasil disimpan']);
    }
}
