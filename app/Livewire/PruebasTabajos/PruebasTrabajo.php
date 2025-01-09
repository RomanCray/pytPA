<?php

namespace App\Livewire\PruebasTabajos;

use App\Models\PruebasTrabajo as ModelsPruebasTrabajo;
use Livewire\Component;
use Livewire\WithFileUploads;

class PruebasTrabajo extends Component
{
    use WithFileUploads;

    public $images = [];
    public $trabajoEdificio;
    public $ImagesSaved = [];

    protected $listeners = ['imagesUpdated' => 'loadImages'];

    public function mount()
    {
        $this->loadImages();
    }

    public function loadImages()
    {
        $this->ImagesSaved = ModelsPruebasTrabajo::select('foto_url', 'id')
            ->where('id_trabajo_edificio', $this->trabajoEdificio)
            ->get()
            ->map(function ($image) {
                $image->unique_key = 'Image-' . $image->id; // Generar clave única
                return $image;
            });
    }

    public function save()
    {
        $this->validate([
            'images.*' => 'image',
        ]);

        foreach ($this->images as $image) {
            $path = $image->getRealPath();
            $dimensions = getimagesize($path);
            $path = $image->store('photos');

            $newHeight = (200 * $dimensions[1]) / $dimensions[0];

            $pt = new ModelsPruebasTrabajo();
            $pt->id_trabajo_edificio = $this->trabajoEdificio;
            $pt->foto_url = $path;
            $pt->size_width = 250;
            $pt->size_height =  round($newHeight > 275 ? $newHeight : 275, 0);
            $pt->save();
        }

        $this->dispatch('imagesUpdated');
        session()->flash('message', 'Imágenes subidas correctamente.');
        $this->reset(['images']);
    }

    public function render()
    {
        $exitenImages = ModelsPruebasTrabajo::where('id_trabajo_edificio', $this->trabajoEdificio)->exists();
        return view('livewire.pruebas-tabajos.pruebas-trabajo', compact('exitenImages'));
    }
}
