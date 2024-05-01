<?php

namespace App\Http\Controllers\back;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function storeFolder(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:folders,title',
            'file_name' => 'required|max:10240'
        ],[
            'title.required' => 'Title wajib diisi',
            'title.unique' => 'Title sudah digunakan',
            'file_name.required' => 'File wajib diisi',
            'file_name.max' => 'File maksimal 10MB'
        ]);

        if ($request->hasFile('file_name')) {
            $path = "folders/";
            $file = $request->file('file_name');
            $filename = $file->getClientOriginalName();
            $new_filename = time() . '' . $filename;
            $upload = Storage::disk('public')->put($path . $new_filename, (string) file_get_contents($file));

            if ($upload) {
                $folder = new Folder();
                $folder->title = $request->title;
                $folder->file_ket = $request->file_ket;
                $folder->file_name = $new_filename;
                $folder->file_type = $request->file('file_name')->getClientMimeType();
                $folder->file_ext = $request->file('file_name')->getClientOriginalExtension();
                $folder->file_size = $request->file('file_name')->getSize();
                $saved = $folder->save();
                if ($saved) {
                    return response()->json(['code' => 1, 'msg' => 'New File has been successfuly created.']);
                } else {
                    return response()->json(['code' => 3, 'msg' => 'Something went wrong!']);
                }
            } else {
                return response()->json(['code' => 3, 'msg' => 'Something went wrong for uploading image.']);
            }
        }
    }

    public function download(Request $request)
    {
        $path = "folders/";
        $post_thumbnails_path = $path . $request->file_name;
        if (!Storage::disk('public')->exists($post_thumbnails_path)) {
        return response('Not found');
        }else{
            return response()->download(storage_path("app/public/folders/") . $request->filename);
        }
    }
    public function editFolder(Request $request) {

        if (!request()->folder_id) {
            return abort(404);
        } else {
            $folder = Folder::find(request()->folder_id);
            $data = [
                'folder' => $folder,
                'pageTitle' => 'Edit folder',
            ];
            return view('back.pages.edit_folder', $data);
        }
    }

    public function updateFolder(Request $request)
    {
        if ($request->hasFile('file_name')) {

            $request->validate([
                'title' => 'required|unique:folders,title,' . $request->folder_id,
                'file_name' => 'required|max:10240'
            ]);
            $path = "folders/";
            $file = $request->file('file_name');
            $filename = $file->getClientOriginalName();
            $new_filename = time() . '' . $filename;
            $upload = Storage::disk('public')->put($path . $new_filename, (string) file_get_contents($file));

            $post_thumbnails_path = $path;
            if (!Storage::disk('public')->exists($post_thumbnails_path)) {
                Storage::disk('public')->makeDirectory($post_thumbnails_path, 0755, true, true);
            }
            if ($upload) {

                $old_post_image = Folder::find($request->folder_id)->file_name;
                if ($old_post_image != null && Storage::disk('public')->exists($path . $old_post_image)) {
                    Storage::disk('public')->delete($path . $old_post_image);
                }
                $folder = Folder::find($request->folder_id);
                $folder->title = $request->title;
                $folder->file_ket = $request->file_ket;
                $folder->file_name = $new_filename;
                $folder->file_type = $request->file('file_name')->getClientMimeType();
                $folder->file_ext = $request->file('file_name')->getClientOriginalExtension();
                $folder->file_size = $request->file('file_name')->getSize();
                $saved = $folder->save();
                if ($saved) {
                    return response()->json(['code' => 1, 'msg' => 'File has been successfuly updated.']);
                } else {
                    return response()->json(['code' => 3, 'msg' => 'Something went wrong, for updating Folder.']);
                }
            } else {
                return response()->json(['code' => 3, 'msg' => 'Error in uploading File.']);
            }
        } else {
            $request->validate([
                'title' => 'required|unique:folders,title,' . $request->folder_id,
            ]);

            $folder = Folder::find($request->folder_id);

            $folder->title = $request->title;
            $folder->file_ket = $request->file_ket;
            $saved = $folder->save();
            if ($saved) {
                return response()->json(['code' => 1, 'msg' => 'File has been successfuly updated.']);
            } else {
                return response()->json(['code' => 3, 'msg' => 'Something went wrong, for updating Folder.']);
            }
        }
    }
}
