<?php

namespace App\Livewire\Edificio;

use App\Models\Edificio as ModelsEdificio;
use App\Models\Proyecto;
use Livewire\Attributes\On;
use Livewire\Component;

class Edificio extends Component
{
    public $proyect = 0;

    public function abrirModale()
    {
        $this->dispatch('abrirModal');
    }

    #[On('cerrarModal')]
    public function cerrarModal($info)
    {
        $this->dispatch('cerrarModalC', $info);
    }
    public function render()
    {
        $verificarEdificio = ModelsEdificio::where('id_proyecto', $this->proyect)->exists();
        // dd($this->proyect, $verificarEdificio);
        if (!$verificarEdificio) {
            $this->abrirModale();
        }

        $nombreProyecto = Proyecto::select('nombre_proyecto')->where('id', $this->proyect)->get();
        return view('livewire.edificio.edificio', compact('nombreProyecto'));
    }
}
