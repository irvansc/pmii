<?php

namespace App\Http\Livewire\Front;

use App\Models\Contact as ModelsContact;
use Livewire\Component;

class Contact extends Component
{
    public $name, $email, $url , $telp , $pesan;

    public function resetForm()
    {
        $this->resetErrorBag();
        $this->name = null;
        $this->email = null;
        $this->url = null;
        $this->pesan = null;
        $this->telp = null;
    }

    public function addContact(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'pesan' => 'required',
        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'telp' => 'Telpon/WhatsAap wajib diisi',
            'pesan' => 'Pesan wajib diisi'
        ]);

        $contact = new ModelsContact();
        $contact->name = $this->name;
        $contact->telp = $this->telp;
        $contact->email = $this->email;
        $contact->url = $this->url;
        $contact->pesan = $this->pesan;
        $contact->save();
        session()->flash('message', 'Pesan terkirim. Mohon menunggu. Admin akan membalas lewat WhatsAap/Email anda');
        $this->resetForm();

    }
    public function render()
    {
        return view('livewire.front.contact');
    }
}
