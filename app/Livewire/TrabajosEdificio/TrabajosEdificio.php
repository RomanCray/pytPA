<?php

namespace App\Livewire\TrabajosEdificio;

use App\Models\Edificio;
use App\Models\Proyecto;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\TrabajoEdificio;

class TrabajosEdificio extends Component
{
    public $id_edificio;
    public $nombreEdificio;

    public function terminarProyecto($id_proyecto) {
        $proyecto = Proyecto::find($id_proyecto);
        $proyecto->status = true;
        $validar = $proyecto->save();
        $this->dispatch('actualizacionProyecto', $validar);
    }

    #[On('cerrarModal')]
    public function cerrarModal($info){
        $this->dispatch('cerrarModalTE', $info);
    }

    public function render()
    {
        $proyectoId = Edificio::select('proyectos.id', 'proyectos.status', 'proyectos.nombre_proyecto')
            ->where('edificios.id', $this->id_edificio)
            ->join('proyectos', 'proyectos.id', '=', 'edificios.id_proyecto')
            ->first();

        return view('livewire.trabajos-edificio.trabajos-edificio', compact('proyectoId'));
    }
}
