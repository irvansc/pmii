<?php

namespace App\Http\Livewire\Back;

use Livewire\Component;
use App\Models\HeaderSection;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class SettingHome extends Component
{
    use WithFileUploads;
    public $settingHome, $title, $description, $img;
    public $isNewImage = false;
    public function mount()
    {
        $this->settingHome  = HeaderSection::find(1);
        $this->title = $this->settingHome->title;
        $this->description = $this->settingHome->description;
        $this->img = $this->settingHome->img;
    }

    public function saveSetting()
    {

        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Title Wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
        ]);

        if ($this->img && is_object($this->img)) {
            $this->validate([
                'img' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ], [
                'img.required' => 'Gambar wajib diisi.',
                'img.image' => 'File bukan image.',
                'img.mimes' => 'Gambar harus berextensi. PNG, JPG, JPEG',
                'img.max' => 'Ukuran Gambar Maksimal 2MB',
            ]);
        }
        $data = [
            'title' => $this->title,
            'description' => $this->description,
        ];

        $this->isNewImage = true;
        if ($this->settingHome) {
            $setting = HeaderSection::find(1);
            $oldImagePath = $setting->img; // Ambil path gambar lama

            if ($this->img && is_object($this->img)) {
                $data['img'] = $this->handleImageUpload($this->img, $oldImagePath);
            }

            $setting->update($data);
            flash()->addSuccess('Setting has been successfully updated.');
        } else {
            if ($this->img && is_object($this->img)) {
                $data['img'] = $this->handleImageUpload($this->img);
            }
            $setting = HeaderSection::create($data);
            $this->settingHome = $setting->id; // Simpan ID dari setting yang baru dibuat
            flash()->addSuccess('Setting has been successfully created.');
        }
    }
    private function handleImageUpload($image, $oldImagePath = null){
        $path = "images/image/";
        $filename = $image->getClientOriginalName();
        $new_filename = time() . '_' . $filename; // Menambahkan underscore untuk kejelasan
        $img = ImageManagerStatic::make($image)->encode('png');

        // Hapus file gambar lama jika ada
        if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
            Storage::disk('public')->delete($oldImagePath);
        }

        // Simpan file gambar baru
        Storage::disk('public')->put($path . $new_filename, $img);
        return $path . $new_filename;
    }
    public function render()
    {
        return view('livewire.back.setting-home');
    }
}
