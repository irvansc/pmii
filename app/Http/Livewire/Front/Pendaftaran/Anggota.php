<?php

namespace App\Http\Livewire\Front\Pendaftaran;

use App\Models\User;
use App\Models\Setting;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\Mail;

class Anggota extends Component
{
    public $name, $username, $email, $jenis_kelamin, $no_hp, $alamat, $password, $password_confirmation;

    public function resetForm()
    {
        $this->reset([
            'name',
            'username',
            'email',
            'password',
            'password_confirmation',
            'no_hp',
            'alamat',
            'jenis_kelamin',
        ]);
    }
    public function daftarAlumni()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required|min:5|max:45|confirmed',
            'password_confirmation' => 'required|min:5|max:45|same:password',
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
            'no_hp.required' => 'No HP tidak boleh kosong',
            'no_hp.numeric' => 'No HP harus angka',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password harus 5 karakter atau lebih',
            'password.max' => 'Password harus 45 karakter atau kurang',
            'password.confirmed' => 'Password tidak sama',
            'password_confirmation.required' => 'Password tidak boleh kosong',
            'password_confirmation.min' => 'Password harus 5 karakter atau lebih',
            'password_confirmation.max' => 'Password harus 45 karakter atau kurang',
            'password_confirmation.same' => 'Password tidak sama',
        ]);
        $alumni = new User;
        $alumni->name = $this->name;
        $alumni->username = Str::slug($this->name);
        $alumni->email = $this->email;
        $alumni->password = bcrypt($this->password);

        $saved = $alumni->save();
        $this->no_hp = preg_replace('/^0?8/', '628', $this->no_hp);

        if ($saved) {
            $alumni->assignRole('user');
            $token = base64_encode(Str::random(64));
            VerificationToken::create([
                'user_id' => $alumni->id,
                'email' => $alumni->email,
                'token' => $token
            ]);

            $alumni->profile()->create([
            'user_id' => $alumni->id,
            'jenis_kelamin' => $this->jenis_kelamin,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat,
            ]);

            $actionLink = route('verify', ['token' => $token]);

            $name = $this->name;
            $email = $this->email;
            $data = array(
                'actionLink' => $actionLink,
                'email' => $email,
                'name' => $name
            );
            $webs = Setting::all();
            foreach ($webs as $web) {
                $web_e = $web ? $web->web_email_noreply : 'default@example.com';
                $web_n = $web ? $web->web_name : 'Default Web Name';
            }
            $mail =  Mail::send('emailVerificationEmail', $data, function ($message) use ($web_e, $web_n, $email, $name) {
                $message->from($web_e, $web_n);
                $message->to($email, $name)
                    ->subject('Verify your Account.');
            });
            if ($mail) {
                $this->resetForm();
                return redirect()->back()->with('success', 'Congratulation ' . $this->name . ' akun sudah terdaftar, <br> Silahkan cek email terdaftar : ' . $this->email . ' untuk verifikasi akun');
            } else {
                $this->resetForm();
                return redirect()->back()->with('fail', 'Terjadi Kesalahan saat mengirim email verifikasi');
            }
        }else {
            return redirect()->back()->with('fail', 'Gagal Mendaftar');
        }
    }

    public function render()
    {
        return view('livewire.front.pendaftaran.anggota');
    }
}
