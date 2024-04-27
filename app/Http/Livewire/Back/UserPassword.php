<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserPassword extends Component
{
    public $current_password, $new_password, $confirm_password;


    public function ChangePassword()
    {
        $this->validate([
            'current_password' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, User::find(auth('web')->id())->password)) {
                        return $fail(__('The current password is incorect'));
                    }
                }
            ],
            'new_password' => 'required|min:5|max:25',
            'confirm_password' => 'same:new_password'
        ], [
            'current_password.required' => 'Enter your current password',
            'new_password.required' => 'Enter new password',
            'confirm_password.same' => 'The confirm password must be equal to the new password'
        ]);

        $query = User::find(auth('web')->id())->update([
            'password' => Hash::make($this->new_password)
        ]);

        if ($query) {
        flash()->addSuccess('Your password has been successfuly updated.');
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
