<?php

namespace App\Livewire\PruebasTabajos;

use App\Models\PruebasTrabajo as ModelPruebasTrabajo;
use Livewire\Component;

class SettingsImage extends Component
{
    public $imageId; // Cambiado de $id a $imageId para mayor claridad
    public $id_trabajo_edificio;
    public $foto_url;
    public $size_width;
    public $size_height;
    public $OriginaSize_width;
    public $OriginaSize_height;

    public function mount($id)
    {
        $this->imageId = $id; // Cambiado a $imageId
        $pt = ModelPruebasTrabajo::find($this->imageId);

        if ($pt) {
            $this->id_trabajo_edificio = $pt->id_trabajo_edificio;
            $this->foto_url = $pt->foto_url;
            $this->size_width = $pt->size_width;
            $this->size_height = $pt->size_height;
            $this->OriginaSize_width = $pt->size_width;
            $this->OriginaSize_height = $pt->size_height;
        }
    }

    public function eliminarImagenes($id)
    {
        $imagen = ModelPruebasTrabajo::find($id);

        if ($imagen) {
            $rutaImagen = storage_path('app/public/' . $imagen->foto_url);

            if (file_exists($rutaImagen)) {
                unlink($rutaImagen);
            }

            $imagen->delete();
            $this->dispatch('imagesUpdated')->to(PruebasTrabajo::class);
            session()->flash('message2', 'Imagen eliminada correctamente.');
        } else {
            session()->flash('message2', 'La imagen no fue encontrada.');
        }
    }

    public function saveAncho()
    {
        $imagen = ModelPruebasTrabajo::find($this->imageId);
        $imagen->size_width = $this->size_width;
        $imagen->save();
    }

    public function restoreAncho()
    {
        $this->size_width = $this->OriginaSize_width;
    }

    public function saveAlto()
    {
        $imagen = ModelPruebasTrabajo::find($this->imageId);
        $imagen->size_height = $this->size_height;
        $imagen->save();
    }

    public function restoreAlto()
    {
        $this->size_height = $this->OriginaSize_height;
    }

    public function render()
    {
        $random = rand(1, 100);
        return view('livewire.pruebas-tabajos.settings-image', compact('random'));
    }
}
