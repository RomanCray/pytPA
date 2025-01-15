<?php

namespace App\Livewire\Proyecto;

use App\Models\Proyecto;

use App\Livewire\Proyecto\Proyecto as ProyectoLivewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ProyectoForm extends Component
{
    public $proyecto;
    public $nombre_proyecto;
    public $titulo_proyecto;
    public $final_description;
    public $accion;
    public $nombreModal;

    protected $rules = [
        'nombre_proyecto' => 'required|max:100|min:3',
    ];
    protected $messages = [
        'nombre_proyecto.required' => 'El campo nombre del proyecto es requerido',
        'nombre_proyecto.min' => 'El campo nombre del proyecto debe tener almenos 3 caracteres',
        'nombre_proyecto.max' => 'El campo nombre del proyecto debe tener un máximo de 100 caracteres',
    ];
    public function mount($proyecto = 0)
    {
        $this->proyecto = $proyecto;
        if ($proyecto == 0) {
            $this->nombre_proyecto = '';
            $this->titulo_proyecto = '';
            $this->final_description = '';
            $this->accion = 'Crear';
        } else {
            $proyecto = Proyecto::find($proyecto);
            $this->nombre_proyecto = $proyecto->nombre_proyecto;
            $this->titulo_proyecto = $proyecto->titulo_proyecto;
            $this->final_description = $proyecto->final_description;
            $this->accion = 'Actualizar';
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->proyecto == 0) {
            $accionProyecto = new Proyecto();
            $accionProyecto->user = Auth::user()->id;
        } else {
            $accionProyecto = Proyecto::find($this->proyecto);
        }

        $accionProyecto->nombre_proyecto = $this->nombre_proyecto;
        $accionProyecto->titulo_proyecto = $this->titulo_proyecto;
        $accionProyecto->final_description = $this->final_description;
        $accionProyecto->save();
        $this->dispatch('refreshDatatable');

        if ($this->proyecto == 0) {
            $this->reset(['nombre_proyecto', 'titulo_proyecto']);
        }

        $typeProyecto = $this->proyecto == 0 ? 'Creado' : 'Modificado';
        $informacion = [
            'titulo' => 'Proyecto ' . $typeProyecto,
            'mensaje' => 'El proyecto "'. $accionProyecto->nombre_proyecto . '" ha sido '. $typeProyecto . ' correctamente',
            'tipo' => $this->proyecto == 0 ? 'bg-success' : 'bg-info'
        ];

        $this->dispatch('proyectoCreated', $informacion)->to(ProyectoLivewire::class);
        $this->dispatch('saveFinished', $this->nombreModal);
    }
    public function render()
    {
        return view('livewire.proyecto.proyecto-form');
    }
}
