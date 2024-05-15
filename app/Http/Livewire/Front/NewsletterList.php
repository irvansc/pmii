<?php

namespace App\Http\Livewire\Front;

use App\Models\Newsletter;
use Livewire\Component;

class NewsletterList extends Component
{

    public $newsletter_list, $email;
    public function resetForm()
    {
        $this->resetErrorBag();
        $this->email = null;
    }
    public function store()
    {
        $this->validate(
            [
                "email" => "required|email",
            ],
            [
                "email.required" => "Email tidak boleh kosong",
                "email.email" => "Email tidak valid",
            ]
        );

        $contact = new Newsletter();
        $contact->email = $this->email;
        $contact->save();
        session()->flash('message', 'Terima kasih, anda berhasil mengikuti kami');
        $this->resetForm();
    }
    public function render()
    {
        return view('livewire.front.newsletter-list');
    }
}
