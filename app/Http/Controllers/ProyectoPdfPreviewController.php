<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProyectoPdfPreviewController extends Controller
{
    public function preview($id)
    {
        // Obtén el proyecto y la fecha actual
        $proyecto = Proyecto::with('edificios.trabajos.fotos')->findOrFail($id);
        $fechaAcual = Carbon::now();

        // Genera el PDF usando la vista
        $pdf = Pdf::loadView('PDF.Proyecto', compact('proyecto', 'fechaAcual'))
            ->setPaper('a4', 'portrait');
            // ->setOptions(['defaultFont' => 'DejaVu Sans']); // Asegura compatibilidad UTF-8

        // Devuelve el PDF en modo de vista previa
        return $pdf->stream($proyecto->nombre_proyecto . '.pdf');
    }

    public function previewPRe($id)
    {
        // Obtén el proyecto y la fecha actual
        $proyecto = Proyecto::with('edificios.trabajos.fotos')->findOrFail($id);
        $fechaAcual = Carbon::now();
        $otra = true;

        // Genera el PDF usando la vista
        return view('PDF.Proyecto', compact('proyecto', 'fechaAcual', 'otra'));

    }
}
