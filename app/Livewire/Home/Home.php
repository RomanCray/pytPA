<?php

namespace App\Livewire\Home;

use App\Models\Proyecto as ModelsProyecto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $proyectosFinalizados = ModelsProyecto::where(['user' => Auth::user()->id, 'status' => 1])->get();
        return view('livewire.home.home', compact('proyectosFinalizados'));
    }
}
