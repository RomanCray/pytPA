<?php

namespace App\Livewire\Proyecto;

use App\Models\Proyecto as ModelsProyecto;
use Livewire\Component;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class ExportWord extends Component
{
    public $id_proyecto;
    public function export()
    {
        // Crear una nueva instancia de PHPWord
        $phpWord = new PhpWord();

        // Agregar una sección al documento
        $section = $phpWord->addSection();

        $proyecto = ModelsProyecto::with('edificios.trabajos.fotos')->findOrFail($this->id_proyecto);

        // Verificar si hay edificios
        if (count($proyecto->edificios) > 0) {
            foreach ($proyecto->edificios as $edificio) {
                // Título del edificio
                $section->addText(
                    "Edificio - {$edificio->nombre_edificio}",
                    ['bold' => true, 'size' => 14]
                );

                // Verificar si hay trabajos
                if (count($edificio->trabajos) > 0) {
                    $key = 1;
                    foreach ($edificio->trabajos as $trabajo) {
                        // Fecha del trabajo
                        $num = $key++;
                        $section->addText(
                            "{$num}) Fecha Trabajo: " .
                            ($trabajo->fecha_inicio ?? now()->toDateString()) .
                            " - " .
                            ($trabajo->fecha_fin ?? 'Indefinido'),
                            ['size' => 12]
                        );

                        // Descripción del trabajo
                        $section->addText("Descripción:", ['bold' => true]);
                        // $section->addText($trabajo->descripcion, ['size' => 12]);
                        $lineasD = explode("\n", $trabajo->descripcion);
                        foreach ($lineasD as $descripcion) {
                            $section->addText($descripcion, ['size' => 12]);
                        }

                        // Materiales (si existen)
                        if (!empty($trabajo->material)) {
                            $section->addText("Materiales:", ['bold' => true]);
                            $lineasM = explode("\n",$trabajo->material);
                            foreach ($lineasM as $key => $material) {
                                $section->addText($material, ['size' => 12]);
                            }
                            // $section->addText(strip_tags($trabajo->material), ['size' => 12]);
                        }

                        // Fotografías (si existen)
                        if (count($trabajo->fotos) > 0) {
                            $section->addText("Fotografías:", ['bold' => true]);

                            foreach ($trabajo->fotos as $foto) {
                                $fotoPath = storage_path('app/public/' . $foto->foto_url);

                                if (file_exists($fotoPath)) {
                                    $section->addImage(
                                        $fotoPath,
                                        [
                                            'width' => 200,
                                            'height' => 200,
                                            'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START
                                        ]
                                    );
                                }
                            }
                        }
                    }
                } else {
                    $section->addText(" - Sin trabajos - ", ['italic' => true, 'size' => 12]);
                }
            }
        } else {
            $section->addText("No hay edificios registrados.", ['italic' => true, 'size' => 12]);
        }

        // Guardar el archivo temporalmente
        $fileName = 'proyecto_' . $proyecto->nombre_proyecto . '.docx';
        $filePath = storage_path($fileName);

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($filePath);



        // Descargar el archivo
        // return response()->download($filePath, $proyecto->nombre_proyecto);
        return response()->streamDownload(function () use ($phpWord) {
            $writer = IOFactory::createWriter($phpWord, 'Word2007');
            $writer->save('php://output');
        }, $fileName, ['Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']);

    }
    public function render()
    {
        return view('livewire.proyecto.export-word');
    }
}
