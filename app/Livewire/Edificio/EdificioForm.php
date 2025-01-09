<?php

namespace App\Livewire\Edificio;

use App\Models\Edificio;

use App\Livewire\Edificio\Edificio as EdificioPrincipal;
use App\Models\SettingsEdificio;
use Livewire\Component;

class EdificioForm extends Component
{
    public $proyect_id;
    public $nombre_edificio = '';
    public $accion_edificio;
    public $nombre_modal;
    public $id_edificio;

    public function mount($accion_edificio = 0, $nombre_edificio = ''){
        $this->accion_edificio = $accion_edificio;
        if ( $accion_edificio > 0) {
            $this->nombre_edificio = $nombre_edificio;
        }
    }

    protected $rules = [
        'nombre_edificio' => 'required|string|max:100|min:3',
    ];

    protected $messages = [
        'nombre_edificio.required' => 'El campo nombre del edificio es requerido',
        'nombre_edificio.min' => 'El campo nombre del edificio debe tener minimo 3 caracters',
        'nombre_edificio.max' => 'El campo nombre del edificio debe tener maximo 100 caracteres',
    ];

    public function save()
    {
        $this->validate();

        if ($this->accion_edificio == 0) {
            $acctionEdificio = new Edificio();
            $acctionEdificio->id_proyecto = $this->proyect_id;
        } else {
            $acctionEdificio = Edificio::find($this->accion_edificio);
        }

        $acctionEdificio->nombre_edificio = $this->nombre_edificio;
        $acctionEdificio->save();
        $this->dispatch('refreshTable');

        $info = [
            'titulo' => $this->accion_edificio == 0 ? 'Edificio creado' : 'Edificio actualizado',
            'mensaje' => $this->accion_edificio == 0 ? 'El edificio ' . $this->nombre_edificio . ' ha sido creado correctamente' : 'El edificio "' . $this->nombre_edificio . '" ha sido actualizado correctamente',
            'tipo' => $this->accion_edificio == 0 ? 'bg-success' : 'bg-info',
            'nombreModal' => $this->nombre_modal ?? 'closeCreateEdificioModal-0',
        ];
        $this->dispatch('cerrarModal', $info)->to(EdificioPrincipal::class);
        $this->dispatch('post-created');

        if ($this->accion_edificio == 0) {
            $this->reset(['nombre_edificio']);
        }

    }
    public function render()
    {
        $listaEdificios = SettingsEdificio::all();
        return view('livewire.edificio.edificio-form', compact('listaEdificios'));
    }
}
