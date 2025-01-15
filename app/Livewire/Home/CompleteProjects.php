<?php

namespace App\Livewire\Home;

use App\Models\Proyecto;
use App\Models\Edificio;
use App\Models\TrabajoEdificio;
use Livewire\Component;

class CompleteProjects extends Component
{
    public $id_proyecto;
    public $proyectoF;
    public $editingField = []; // Para rastrear qué campo se está editando
    public $fieldValues = []; // Para almacenar valores temporales de los campos

    public function mount($proyect)
    {
        $this->id_proyecto = $proyect;
        $this->proyectoF = Proyecto::with('edificios.trabajos.fotos')->findOrFail($proyect);

        // Inicializa los valores de los campos
        foreach ($this->proyectoF->edificios as $edificio) {
            $this->fieldValues["edificio_{$edificio->id}_nombre"] = $edificio->nombre_edificio;
            foreach ($edificio->trabajos as $trabajo) {
                $this->fieldValues["trabajo_{$trabajo->id}_descripcion"] = $trabajo->descripcion;
                $this->fieldValues["trabajo_{$trabajo->id}_material"] = $trabajo->material;
            }
        }
    }

    public function startEditing($field)
    {
        $this->editingField[$field] = true;
    }

    public function cancelEditing($field)
    {
        $this->editingField[$field] = false;
    }

    public function saveField($type, $id, $fieldName)
    {
        $value = $this->fieldValues["{$type}_{$id}_{$fieldName}"];
        if ($type === 'edificio') {
            $edificio = Edificio::find($id);
            $edificio->{$fieldName} = $value;
            $edificio->save();
        } elseif ($type === 'trabajo') {
            $trabajo = TrabajoEdificio::find($id);
            $trabajo->{$fieldName} = $value;
            $trabajo->save();
        }

        $this->editingField["{$type}_{$id}_{$fieldName}"] = false;
        $this->mount($this->id_proyecto); // Recarga los datos del proyecto
    }

    public function render()
    {
        return view('livewire.home.complete-projects');
    }
}
