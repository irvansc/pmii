<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function Myprofile($id)
    {
        $user = User::findorFail($id);


        return view('back.user.profile', compact('user'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::findorFail($id);


        // return view('back.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findorFail($id);
        $request->validate(
            [
                'name' => 'required',
            ]

        );

        if ($user->email != $request->email) {
            $request->validate([
                'email' => 'unique:users,email,except,id'
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->save();
        Session::flash('success', 'Student updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function posteditStepOne(Request $request, $id)
    {
        $user = User::findorFail($id);
        $user->gender = $request->gender;
        $user->birth_date = $request->birth_date;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->about = $request->about;

        $user->save();
        Session::flash('success', 'Student updated successfully');


        return back();
    }

    public function posteditStepTwo(Request $request, $id)
    {
        $user = User::findorFail($id);

        $user->sd = $request->sd;
        $user->smp = $request->smp;
        $user->sma = $request->sma;
        $user->s1 = $request->s1;
        $user->s2 = $request->s2;
        $user->s3 = $request->s3;


        $user->save();
        Session::flash('success', 'Student updated successfully');


        return back();
    }


    public function posteditStepThree(Request $request, $id)
    {
        $user = User::findorFail($id);
        $request->validate(
            [
                'facebook' => 'url',
                'instagram' => 'url',
                'twitter' => 'url',
            ]

        );
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->twitter = $request->twitter;

        $user->save();
        Session::flash('success', 'Student updated successfully');


        return back();
    }

    public function posteditStepFour(Request $request, $id)
    {
        $user = User::findorFail($id);
        $request->validate(
            [
                'path_image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            ]

        );
        if ($request->file('path_image')) {
            File::delete('images/user/' . $user->path_image);
            $file = $request->file('path_image');
            $filename = "PMII_" .  date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->fit(600);
            $image_resize->save('images/user/' . $filename);
            $user->path_image = $filename;
        }
        $user->save();
        Session::flash('success', 'Student updated successfully');
        return back();
    }

    public function posteditStepFive(Request $request, $id)
    {

        $user  = User::findorFail($id);
        $validated = Validator::make($request->all(), [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
        ])->after(function ($validator) use ($user, $request) {
            if (! isset($request['current_password']) || ! Hash::check($request['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        });

        if ($validated->fails()) {
            return back()->withErrors($validated->errors());
        }

        $user->forceFill([
            'password' => Hash::make($request['password']),
        ])->save();

        Session::flash('success', 'Student updated successfully');
        return back();
    }


}
