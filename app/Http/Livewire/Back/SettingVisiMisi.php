<?php

namespace App\Http\Livewire\Back;

use App\Models\Misi;
use App\Models\Visi;
use Livewire\Component;

class SettingVisiMisi extends Component
{

    public $visi, $desc, $name, $icon, $color;
    public $selected_misi_id;
    public $updateMisiMode = false;

    public $listeners = [
        'resetModalForm',
        'deleteMisiAction',
        'updateMisiOrdering',
    ];
    public function resetModalForm()
    {
        $this->resetErrorBag();
        $this->name = null;
    }
    public function mount()
    {
        $this->visi = Visi::find(1);
        if ($this->visi == null) {
            $this->desc = '';
        } else {
        $this->desc = $this->visi->desc;
        }
    }

    public function addMisi()
    {
        $this->validate([
            'name' => 'required|unique:misis,name',
        ]);
        $category = new Misi();
        $category->name = $this->name;
        $category->icon = $this->icon;
        $category->color = $this->color;
        $saved = $category->save();

        if ($saved) {
            $this->dispatchBrowserEvent('hideMisiModal');
            $this->name = null;
            $this->icon = null;
            $this->color = null;
           flash()->addSuccess('New Misi has been successfuly added.');
        } else {
           flash()->addError('Something went wrong!');
        }
    }

    public function editMisi($id)
    {
        $misi = Misi::findOrFail($id);
        $this->selected_misi_id = $misi->id;
        $this->name = $misi->name;
        $this->icon = $misi->icon;
        $this->color = $misi->color;
        $this->updateMisiMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showmisiModal');
    }
    public function updateMisi()
    {
        if ($this->selected_misi_id) {
            $this->validate([
                'name' => 'required|unique:misis,name,' . $this->selected_misi_id,
            ]);

            $misi = Misi::findOrFail($this->selected_misi_id);
            $misi->name = $this->name;
            $misi->icon = $this->icon;
            $misi->color = $this->color;
            $updated = $misi->save();
            if ($updated) {
                $this->dispatchBrowserEvent('hideMisiModal');
                $this->updateMisiMode = false;
                flash()->addSuccess('Misi has been successfuly updated.');
            } else {
                flash()->addError('Something went wrong!');
            }
        }
    }
    public function deleteMisi($id)
    {
        $misi = Misi::find($id);
        $this->dispatchBrowserEvent('deleteMisi', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <b>' . $misi->name . '</b> misi',
            'id' => $id
        ]);
    }

    public function deleteMisiAction($id)
    {
        $misi = Misi::where('id', $id)->first();
            $misi->delete();
           flash()->addSuccess('Misi has been successfuly deleted.');
    }

    public function updateMisiOrdering($positions)
    {
        foreach ($positions as $p) {
            $index = $p[0];
            $newPosition = $p[1];
            Misi::where('id', $index)->update([
                'ordering' => $newPosition,
            ]);

        }
        flash()->addSuccess('Misi ordering has been successfuly updated.');
    }
    public function saveVisi()
    {
        $this->validate([
            'desc'=> 'required'
        ]);

        $data = [
            'desc' => $this->desc
        ];

        $this->visi = Visi::updateOrCreate(['id' => 1], $data);

        if ($this->visi->wasRecentlyCreated) {
            flash()->addSuccess('Visi has been successfully created.');
        } else {
            flash()->addSuccess('Visi has been successfully updated.');
        }
    }
    public function render()
    {
        return view('livewire.back.setting-visi-misi',[
            'misi' => Misi::orderBy('ordering', 'asc')->get(),
        ]);
    }
}
