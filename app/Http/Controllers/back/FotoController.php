<?php

namespace App\Http\Controllers\back;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                $upload = Storage::disk('public')->put($path . $new_filename, (string) file_get_contents($file));

                $insert[$key]['img'] = $new_filename;
                $insert[$key]['title'] = $filename;
                $insert[$key]['album_id'] = $request->album_id;
            }
            Foto::insert($insert);
        }
        return redirect()->route('setting.galery')->with(['success' => 'Foto berhasil disimpan']);
    }
}
