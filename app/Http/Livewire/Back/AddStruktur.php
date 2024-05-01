<?php

namespace App\Http\Livewire\Back;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Str;

class AddStruktur extends Component
{
    use WithFileUploads;
    public $name, $email, $jenkel, $alamat, $jabatan, $telp, $fb, $ig, $twitter, $linkedin , $img;
    public $stu;

    public function resetForm()
    {
        $this->resetErrorBag();
        $this->name = null;
        $this->email = null;
        $this->jenkel = null;
        $this->alamat = null;
        $this->jabatan = null;
        $this->telp = null;
        $this->fb = null;
        $this->ig = null;
        $this->twitter = null;
        $this->linkedin = null;
        $this->img = null;
        $this->stu = null;
    }
    public function addStu()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'jenkel'=> 'required',
            'telp' => 'required',
            'jabatan'=> 'required',
            'alamat'=> 'required',
            'img'=> 'required|image|mimes:png,jpeg,jpg|max:2048'
        ],[
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email Tidak valid',
            'jenkel'=> 'Jenis kelamin wajib dipilih',
            'telp' => 'Telphone wajib diisi.',
            'alamat' => 'Alamat wajib diisi',
            'jabatan' => 'Jabatan wajib diisi.',

            'img.required'=> 'Picture wajib diisi.',
            'img.image' => 'File bukan image.',
            'img.mimes' => 'Picture harus berextensi :jpg.png.jpeg.',
            'img.max' => 'Piture max 2MB',
        ]);

        $stu = new StrukturOrganisasi();
        $stu->name = $this->name;
        $stu->email = $this->email;
        $stu->jenkel = $this->jenkel;
        $stu->jabatan = $this->jabatan;
        $stu->telp = $this->telp;
        $stu->fb = $this->fb;
        $stu->twitter = $this->twitter;
        $stu->linkedin = $this->linkedin;
        $stu->ig = $this->ig;
        $stu->alamat = $this->alamat;
        $stu->username= Str::slug($this->name);

        $path = "images/album/stu/";
        $file = $this->img;
        $filename = $file->getClientOriginalName();
        $new_filename = Str::slug($this->name) . '' . $filename;
        $img = ImageManagerStatic::make($this->img)->encode('jpg');
        $file = Storage::disk('public')->put($path . $new_filename, $img);
        $stu->img = $new_filename;
        $saved = $stu->save();
        if ($saved) {
            $this->resetForm();
           flash()->addSuccess('Data has been successfuly added.');
        } else {
           flash()->addError('Something went wrong!');
        }

    }
    public function render()
    {
        return view('livewire.back.add-struktur');
    }
}
