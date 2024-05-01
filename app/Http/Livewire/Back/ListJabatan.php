<?php

namespace App\Http\Livewire\Back;

use App\Models\Jabatan;
use Livewire\Component;

class ListJabatan extends Component
{
    public $name_jabatan, $name_periode;
    public $selected_jabatan_id;
    public $updateJabatanMode = false;

    public $listeners = [
        'resetModalForm',
        'deleteJabatanAction',
        'updateJabatanOrdering',
    ];
    public function resetModalForm()
    {
        $this->resetErrorBag();
        $this->name_jabatan = null;
        $this->name_periode = null;
        $this->selected_jabatan_id = null;
    }
    public function addJabatan()
    {
        $this->validate([
            'name_jabatan' => 'required|unique:jabatans,name_jabatan',
            'name_periode' => 'required'
        ]);
        $jabatan = new Jabatan();
        $jabatan->name_jabatan = $this->name_jabatan;
        $jabatan->name_periode = $this->name_periode;
        $saved = $jabatan->save();

        if ($saved) {
            $this->dispatchBrowserEvent('hideJabatanModal');
            $this->name_jabatan = null;
            $this->name_periode = null;
            flash()->addSuccess('New Jabatan has been successfuly added.', 'success');
        } else {
            flash()->addError('Something went wrong!', 'error');
        }
    }
    public function editJabatan($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        // dd($jabatan);
        $this->selected_jabatan_id = $jabatan->id;
        $this->name_jabatan = $jabatan->name_jabatan;
        $this->name_periode = $jabatan->name_periode;
        $this->updateJabatanMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showjabatanModal');
    }


    public function updateJabatan()
    {
        if ($this->selected_jabatan_id) {
            $this->validate([
                'name_jabatan' => 'required|unique:jabatans,name_jabatan,' . $this->selected_jabatan_id,
                'name_periode' => 'required'
            ]);

            $jabatan = Jabatan::findOrFail($this->selected_jabatan_id);
            $jabatan->name_jabatan = $this->name_jabatan;
            $jabatan->name_periode = $this->name_periode;
            $updated = $jabatan->save();
            if ($updated) {
                $this->dispatchBrowserEvent('hideJabatanModal');
                $this->updateJabatanMode = false;
                flash()->addSuccess('Jabatan has been successfuly updated.', 'success');
            } else {
                flash()->addError('Something went wrong!', 'error');
            }
        }
    }




    public function deleteJabatan($id)
    {
        $jabatan = Jabatan::find($id);
        $this->dispatchBrowserEvent('deleteJabatan', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <b>' . $jabatan->name_jabatan . '</b> jabatan',
            'id' => $id
        ]);
    }

    public function deleteJabatanAction($id)
    {
        $jabatan = Jabatan::with('userOrganization')->findOrFail($id);

        if ($jabatan->userOrganization->isNotEmpty()) {
            flash()->addError('Jabatan cannot be deleted because it has associated User Organizations.');
            return;
        }

        $jabatan->delete();
        flash()->addSuccess('Jabatan has been successfully deleted.');
    }

    public function updateJabatanOrdering($positions)
    {
        foreach ($positions as $p) {
            $index = $p[0];
            $newPosition = $p[1];
            Jabatan::where('id', $index)->update([
                'ordering' => $newPosition,
            ]);
        }
        flash()->addSuccess('Jabatan ordering has been successfuly updated.', 'success');
    }

    public function render()
    {
        return view('livewire.back.list-jabatan', [
            'jabatans' => Jabatan::with('userOrganization')->orderBy('ordering', 'asc')->get(),
        ]);
    }
}
