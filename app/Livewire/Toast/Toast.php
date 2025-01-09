<?php

namespace App\Livewire\Toast;

use Livewire\Component;

class Toast extends Component
{
    public $principalKey;
    public $idToast;
    public $tituloToast;
    public $toastMessage;
    public $idButton;
    public $tipo;

    public function mount($idToast, $tituloToast, $toastMessage, $idButton, $principalKey, $tipo)
    {
        $this->principalKey = $principalKey;
        $this->idToast = $idToast;
        $this->tituloToast = $tituloToast;
        $this->toastMessage = $toastMessage;
        $this->idButton = $idButton;
        $this->tipo = $tipo;
    }

    public function render()
    {
        return view('livewire.toast.toast');
    }
}
