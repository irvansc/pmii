<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\VerificationToken;
use App\Http\Controllers\Controller;

class AlumniController extends Controller
{
    public function verifyUser(Request $request, $token)
    {
        $verifyUser = VerificationToken::where('token', $token)->first();

        if (!is_null($verifyUser)) {
            $user = User::where('email', $verifyUser->email)->first();

            if (!$user->verified) {
                $user->verified = 1;
                $user->email_verified_at = Carbon::now();
                $user->save();
                return redirect()->route('login')->with('sukses', 'Bagus!, Anda berhasil memverifikasi email Anda. Sekarang Anda dapat masuk ke akun Anda. dan lengkapi data anda segera.');
            } else {
                return redirect()->route('login')->with('sukses', 'Anda telah berhasil memverifikasi email Anda. Sekarang Anda dapat masuk ke akun Anda.');
            }
        } else {

            return redirect()->route('team.pendaftaran.alumni')->with('fail', 'Maaf Token tidak ditemukan. Silahkan coba lagi.');
        }
    }
}
