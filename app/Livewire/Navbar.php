<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Actions\Logout;

class Navbar extends Component
{

    public function cerrarSesion(Logout $logout)
    {
        $logout();

        $this->redirect('/');
    }

    public function goHome()
    {
        // $this->redirect('/');
        $this->redirect('/proyectos');
    }
    public function render()
    {
        return view('livewire.navbar');
    }
}
