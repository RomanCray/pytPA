<?php

namespace App\Livewire\Proyecto;

use App\Models\Edificio;
use App\Models\Proyecto;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ProyectoExportPdf extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;  // Establece el id pasado como parámetro
    }
    public function exportar()
    {
        // Datos básicos
        $data = ['mensaje' => 'Hola, este es un PDF de prueba'];

        // Generar el PDF con una vista mínima
        try {
            $pdf = Pdf::loadView('PDF.Proyecto', $data)
                ->setPaper('a4', 'portrait')
                ->setOptions(['defaultFont' => 'DejaVu Sans']);

            return $pdf->download('prueba.pdf');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Captura el mensaje de error
        }

    }

    public function preview()
    {
        // Generar la URL para la vista previa del PDF
        $url = route('proyecto.pdf-preview', ['id' => $this->id]);

        // Emitir un evento para abrir la vista previa
        $this->dispatch('showPdfPreview', $url);
    }



    public function render()
    {
        // dd(phpinfo());
        return view('livewire.proyecto.proyecto-export-pdf');
    }
}
