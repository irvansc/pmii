<?php

namespace App\Http\Livewire\Back;

use App\Models\Setting;
use Livewire\Component;

class GeneralSetting extends Component
{
    public $settings;

    public $web_name,$web_url, $web_email, $web_email_noreply ,$web_telp, $web_tagline, $web_maps, $web_desc, $web_alamat;

    public function mount()
    {
        $this->settings = Setting::find(1);
        $this->web_name = optional($this->settings)->web_name;
        $this->web_url = optional($this->settings)->web_url;
        $this->web_tagline = optional($this->settings)->web_tagline;
        $this->web_telp = optional($this->settings)->web_telp;
        $this->web_email = optional($this->settings)->web_email;
        $this->web_email_noreply = optional($this->settings)->web_email_noreply;
        $this->web_maps = optional($this->settings)->web_maps;
        $this->web_alamat = optional($this->settings)->web_alamat;
        $this->web_desc = optional($this->settings)->web_desc;
    }
    public function updateGeneralSettings()
    {

        $update =  $this->settings->update([
            'web_name' => $this->web_name,
            'web_url' => $this->web_url,
        'web_tagline' => $this->web_tagline,
        'web_telp' => $this->web_telp,
        'web_email' => $this->web_email,
        'web_email_noreply' => $this->web_email_noreply,
        'web_maps' => $this->web_maps,
        'web_alamat' => $this->web_alamat,
        'web_desc' => $this->web_desc,

        ]);
        if ($update) {
            flash()->addSuccess('General settings successfuly updated');
            $this->emit('updateAdminFooter');
        } else {
            flash()->addError('Something wrong!');
        }
    }

    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }
    public function render()
    {
        return view('livewire.back.general-setting');
    }
}
