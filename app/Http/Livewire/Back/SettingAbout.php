<?php

namespace App\Http\Livewire\Back;

use App\Models\About;
use Livewire\Component;

class SettingAbout extends Component
{

    public $about, $title, $description, $tujuan, $url_video;

    public function mount()
    {
        $this->about = About::find(1);
        $this->title = $this->about->title;
        $this->description = $this->about->description;
        $this->tujuan = $this->about->tujuan;
        $this->url_video = $this->about->url_video;

    }

    public function saveAbout()
    {
        $this->validate([
            "title"=> "required",
            "description"=> "required",
            "tujuan"=> "required",
        ]);

        $update = $this->about->update([
            "title"=> $this->title,
            "description"=> $this->description,
            "tujuan" => $this->tujuan,
            "url_video" => $this->url_video
        ]);

        if ($update) {
            flash()->addSuccess("About successfuly updated");
        } else {
            flash()->addError("Something went wrong!");
            # code...
        }



    }
    public function render()
    {
        return view('livewire.back.setting-about');
    }
}
