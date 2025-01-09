<?php

namespace App\Livewire\Proyecto;

use Livewire\Component;

class ActionsDataTable extends Component
{
    public string $nombreIcono;
    public string $color;
    public string $size;
    public string $nombre;
    public string $ruta;
    public $data;

    public function mount($nombreIcono = 'priority_high', $color = '', $size = '24', $ruta, $data, $nombre)
    {
        $this->nombreIcono = $nombreIcono;
        $this->color = $color;
        $this->size = $size;
        $this->nombre = $nombre;
        $this->ruta = $ruta;
        $this->data = $data;
    }
    public function render()
    {
        return view('livewire.proyecto.actions-data-table');
    }
}
