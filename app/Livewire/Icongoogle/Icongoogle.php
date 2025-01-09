<?php

namespace App\Livewire\Icongoogle;

use Livewire\Component;

class Icongoogle extends Component
{
    public string $nombre;
    public string $color;
    public string $size;

    public string $clases;

    public function mount($nombre = 'priority_high' , $color = '', $size = '24', $clases = 'me-2')
    {
        $this->nombre = $nombre;
        $this->color = $color;
        $this->size = $size;
        $this->clases = $clases;
    }
    public function render()
    {
        return view('livewire.icongoogle.icongoogle');
    }
}
