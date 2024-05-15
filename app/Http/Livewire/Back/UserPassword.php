<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserPassword extends Component
{
    public $current_password, $new_password, $confirm_password;
    public $loading = false;




    public function ChangePassword()
    {
        $this->loading = true;

        $this->validate([
            'current_password' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, User::find(auth('web')->id())->password)) {
                        return $fail(__('Password lama anda salah'));
                    }
                }
            ],
            'new_password' => 'required|min:5|max:25',
            'confirm_password' => 'same:new_password'
        ],[
            'current_password.required' => 'password lama anda salah',
            'new_password.required' => 'password baru harus diisi',
            'confirm_password.same' => 'password baru harus sama dengan confirm password',
            'new_password.min' => 'password minimal 5 karakter',
            'new_password.max' => 'password maksimal 25 karakter',
        ]);

        $query = User::find(auth('web')->id())->update([
            'password' => Hash::make($this->new_password)
        ]);

        if ($query) {
        flash()->addSuccess('Your password has been successfuly updated.');
            $this->loading = false;

            $this->current_password = $this->new_password = $this->confirm_password = null;
        } else {
        flash()->addError('Something went wrong');

        }
    }
    public function render()
    {
        return view('livewire.back.user-password');
    }
}
