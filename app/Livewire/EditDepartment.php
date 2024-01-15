<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;
use Livewire\Attributes\On;

class EditDepartment extends Component
{

    public $departmentId=0;
    public $libelle;
    public Department $departement;
    public function mount($departement)
    {
        $this->departement= $departement;
       // $department = Department::findOrFail($departmentId);
        $this->departmentId = $departement->id;
        $this->libelle = $departement->libelle;
    }


    public function updateDepartment()
    {
        $this->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $this->departement->libelle = $this->libelle;
        $this->departement->save();
        //$this->dispatch('onUpdate');
        return redirect()->route('departments.index')->with('success', 'Département mis à jour avec succès !');
    }

    #[On('onUpdate')] 
    public function refreshDepartments()
    {
        $this->reset('departmentId');
    }

    public function render()
    {

        return view('livewire.edit-department');
    }
}
