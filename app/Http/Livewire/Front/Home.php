<?php

namespace App\Http\Livewire\Front;

use App\Models\Misi;
use App\Models\Visi;
use App\Models\About;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {

        $about = About::first();
        $visi = Visi::first();
        $misi = Misi::all();

        $userAlumni = User::role('alumni')->count();
        $userAnggota = User::role('user')->count();
        return view('livewire.front.home',[
            'about'=> $about,
            'visi'=> $visi,
            'misi'=> $misi,
            'userAnggota'=> $userAnggota,
            'userAlumni'=> $userAlumni
        ]);
    }


}
