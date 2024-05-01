<?php

namespace App\Http\Controllers\back;

use App\Models\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function changeWebLogo(Request $request)
    {
        $setting = Logo::find(1);
        $logo_path = 'back/dist/img/logo/';
        $old_logo = $setting->getAttributes()['logo_utama'];
        $file = $request->file('logo_utama');
        $filename = rand(1, 100000) . 'logo.png';
        if ($request->hasFile('logo_utama')) {
            if ($old_logo != null  && File::exists(public_path($logo_path . $old_logo))) {
                File::delete(public_path($logo_path . $old_logo));
            }
            $upload = $file->move(public_path($logo_path), $filename);
            if ($upload) {
                $setting->update([
                    'logo_utama' => $filename
                ]);
                return response()->json(['status' => 1, 'msg' => 'Logo has been successfuly updated.']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Something wrong!']);
            }
        }
    }

    public function changeEmailLogo(Request $request)
    {
        $setting = Logo::find(1);
        $logo_path = 'back/dist/img/logo/';
        $old_logo = $setting->getAttributes()['logo_email'];
        $file = $request->file('logo_email');
        $filename = rand(1, 100000) . 'logo-email.png';
        if ($request->hasFile('logo_email')) {
            if ($old_logo != null  && File::exists(public_path($logo_path . $old_logo))) {
                File::delete(public_path($logo_path . $old_logo));
            }
            $upload = $file->move(public_path($logo_path), $filename);
            if ($upload) {
                $setting->update([
                    'logo_email' => $filename
                ]);
                return response()->json(['status' => 1, 'msg' => 'Logo Email has been successfuly updated.']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Something wrong!']);
            }
        }
    }

    public function changeWebFavicon(Request $request)
    {
        $setting = Logo::find(1);
        $favicon_path = 'back/dist/img/logo/';
        $old_favicon = $setting->getAttributes()['logo_favicon'];
        $file = $request->file('logo_favicon');
        $filename = rand(1, 100000) . 'favicon.ico';
        if ($request->hasFile('logo_favicon')) {
            if ($old_favicon != null  && File::exists(public_path($favicon_path . $old_favicon))) {
                File::delete(public_path($favicon_path . $old_favicon));
            }
            $upload = $file->move(public_path($favicon_path), $filename);
            if ($upload) {
                $setting->update([
                    'logo_favicon' => $filename
                ]);
                return response()->json(['status' => 1, 'msg' => 'Larablog has been successfuly updated.']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Something wrong!']);
            }
        }
    }


    public function form($strukturId)
    {
        return view('back.admin.pages.formStruktur',compact('strukturId'));

    }
}
