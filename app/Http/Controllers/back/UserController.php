<?php

namespace App\Http\Controllers\back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('back.users.index');
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
        $user = User::with('profile')->where('username', $id)->first();
return view('back.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::where('username', $id)->get();
        return view('back.admin.users.edit', compact('users'));
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

    public function changeProfilePicture(Request $request)
    {
        $user = User::with('profile')->where('username', auth()->user()->username)->first();

        if (!$user) {
            return response()->json(['status' => 0, 'msg' => 'User not found']);
        }

        // Pastikan profile ada, jika tidak, buat satu baru
        $profile = $user->profile()->firstOrCreate();

        $path = 'back/img/user/';
        $file = $request->file('file');
        $old_picture = $profile->getAttributes()['picture']; // Sekarang menggunakan $profile yang sudah pasti ada
        $file_path = $path . $old_picture;
        $new_picture_name = 'AIMG' . $user->id . time() . rand(1, 100000) . '.jpg';

        if ($old_picture != null && File::exists(public_path($file_path))) {
            File::delete(public_path($file_path));
        }

        $upload = $file->move(public_path($path), $new_picture_name);
        if ($upload) {
            $profile->update([
                'picture' => $new_picture_name
            ]);
            return response()->json(['status' => 1, 'msg' => 'Your profile picture has been successfully updated.']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong, try again later']);
        }
    }
}
