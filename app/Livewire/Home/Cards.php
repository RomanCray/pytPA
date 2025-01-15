<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Cards extends Component
{

    public $id;
    public $nombre_proyecto;


    public function render()
    {
        return view('livewire.home.cards');
    }
}
