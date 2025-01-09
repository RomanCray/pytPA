<?php

namespace App\Livewire\Edificio;

use App\Models\SettingsEdificio as ModelsSettingsEdificio;
use Livewire\Component;

class SettingsEdificios extends Component
{
    public $nombreEdificio;
    public $buscar = '';

    public $editingId = null; // Almacena el ID del edificio que se está editando.
    public $editName = []; // Almacena los nombres editados temporalmente.


    protected $rules = [
        'nombreEdificio' => 'required|min:3',
    ];

    protected $messages = [
        'nombreEdificio.required' => 'El campo es obligatorio',
        'nombreEdificio.min' => 'El campo debe tener al menos 3 caracteres',
    ];

    public function save($id = 0)
    {
        $this->validate();

        if ($id == 0) {
            $newEdificio = new ModelsSettingsEdificio();
        } else {
            $newEdificio = ModelsSettingsEdificio::find($id);
        }

        $newEdificio->edificio_name = $this->nombreEdificio;
        $newEdificio->save();

        // Limpia el campo de entrada
        $this->nombreEdificio = '';

        // Refresca la lista
        $this->dispatch('$refresh');
    }


    public function delete($id)
    {
        $newEdificio = ModelsSettingsEdificio::find($id);
        if ($newEdificio) {
            $newEdificio->delete();
        }

        $this->dispatch('$refresh');
    }

    public function clearBuscar()
    {
        $this->buscar = '';
    }

    public function edit($id)
    {
        $this->editingId = $id;
        $this->editName[$id] = ModelsSettingsEdificio::find($id)->edificio_name;
    }

    public function confirmEdit($id)
    {
        $this->validate([
            "editName.$id" => 'required|min:3',
        ]);

        $edificio = ModelsSettingsEdificio::find($id);
        if ($edificio) {
            $edificio->edificio_name = $this->editName[$id];
            $edificio->save();
        }

        $this->editingId = null;
    }

    public function cancelEdit()
    {
        $this->editingId = null;
    }


    public function render()
    {
        $edificios = ModelsSettingsEdificio::when($this->buscar, function ($query) {
            $query->where('edificio_name', 'like', '%' . $this->buscar . '%');
        })->orderBy('created_at', 'desc')->get();

        return view('livewire.edificio.settings-edificios', compact('edificios'));
    }

}
