<?php

namespace App\Livewire\Proyecto;

use Livewire\Component;
use App\Models\Proyecto as ModelsProyecto;
use Livewire\Attributes\On;

class Proyecto extends Component
{

    #[On('proyectoDeleted')]
    public function proyectoDeleted ($info){
        $this->dispatch('proyectoDeletedF', $info);
        return true;
    }

    #[On('proyectoCreated')]
    public function proyectoCreated ($info){
        $this->dispatch('proyectoCreatedC', $info);
        return true;
    }

    public function render()
    {
        return view('livewire.proyecto.proyecto');
    }
}
