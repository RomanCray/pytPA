<?php

namespace App\Livewire\TrabajosEdificio;

use Livewire\Component;
use App\Models\TrabajoEdificio;
use Livewire\Attributes\On;
use App\Livewire\Edificio\Edificio as EdificioPrincipal;
use App\Livewire\TrabajosEdificio\TrabajosEdificio as TrabajosEdificioPrincipal;

class FormCreateTrbEdif extends Component
{
    public $nombre_modal;
    public $generalName;
    public $inOtehrVist;
    public $id_edificio;
    public $id_trabajo_edificio;
    public $fecha_inicio;
    public $fecha_fin;
    public $descripcion;
    public $material;

    public function mount($id_trabajo_edificio = 0, $inOtehrVist = false)
    {
        $this->inOtehrVist = $inOtehrVist;
        if ($id_trabajo_edificio > 0) {
            $modelo = TrabajoEdificio::findOrFail($id_trabajo_edificio);
            $this->id_trabajo_edificio = $modelo->id;
            $this->id_edificio = $modelo->id_edificio;
            $this->fecha_inicio = $modelo->fecha_inicio;
            $this->fecha_fin = $modelo->fecha_fin;
            $this->descripcion = $modelo->descripcion;
            $this->material = $modelo->material;
        }
        // dd("llegue");
    }

    protected $rules = [
        'fecha_inicio' => 'required',
        'descripcion' => 'required',
    ];

    protected $messages = [
        'fecha_inicio.required' => 'El campo de fecha es Obligatorio',
        'descripcion.required' => 'La descripción es Obligatoria',
    ];

    public function save()
    {
        $this->validate();

        if ($this->id_trabajo_edificio > 0 && $this->id_trabajo_edificio != null) {
            $trabajoEdificio = TrabajoEdificio::find($this->id_trabajo_edificio);
        } else {
            $trabajoEdificio = new TrabajoEdificio();
            $trabajoEdificio->id_edificio = $this->id_edificio;
        }
        $trabajoEdificio->fecha_inicio = $this->fecha_inicio;
        $trabajoEdificio->fecha_fin = $this->fecha_fin;
        $trabajoEdificio->descripcion = $this->descripcion;
        $trabajoEdificio->material = $this->material;
        $trabajoEdificio->save();

        $info = [
            'titulo' => ($this->id_trabajo_edificio > 0 && $this->id_trabajo_edificio != null) ? 'Trabajo actualizado' : 'Trabajo creado',
            'mensaje' => ($this->id_trabajo_edificio > 0 && $this->id_trabajo_edificio != null) ? 'El trabajo ha sido actualizado correctamente' : 'El trabajo ha sido creado correctamente',
            'tipo' => ($this->id_trabajo_edificio > 0 && $this->id_trabajo_edificio != null) ? 'bg-info' : 'bg-success',
            'nombreModal' => $this->nombre_modal ?? 'closeCreateEdificioModal-0',
        ];

        if ($this->inOtehrVist) {
            $this->dispatch('refreshTable');
            $this->dispatch('cerrarModal', $info)->to(EdificioPrincipal::class);
        } else {
            $this->dispatch('refreshDatatable');
            $this->dispatch('cerrarModal', $info)->to(TrabajosEdificioPrincipal::class);

            if ($this->id_trabajo_edificio > 0 && $this->id_trabajo_edificio != null) {
                $this->dispatch($this->nombre_modal);
            } else {
                $this->dispatch('clearTextMateriales' . $this->generalName);
                $this->dispatch('clearTextDescripcion' . $this->generalName);
                // $this->dispatch('refreshComponentTE')->to(TrabajosEdificio::class);

                $this->reset([
                    'fecha_inicio',
                    'fecha_fin',
                    'descripcion',
                    'material'
                ]);
            }
        }
    }

    #[On('textDescripcion')]
    public function textDescripcion($texto = '')
    {
        $this->descripcion = $texto;
    }

    #[On('textMateriales')]
    public function textMateriales($texto)
    {
        $this->material = $texto;
    }

    public function render()
    {
        return view('livewire.trabajos-edificio.form-create-trb-edif');
    }
}
