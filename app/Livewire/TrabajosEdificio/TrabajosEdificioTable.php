<?php

namespace App\Livewire\TrabajosEdificio;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TrabajoEdificio;
use Illuminate\Database\Eloquent\Builder;

class TrabajosEdificioTable extends DataTableComponent
{
    public $edificio;
    public $NomreEdificio;
    protected $model = TrabajoEdificio::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Fecha inicio", "fecha_inicio")
                ->sortable(),
            Column::make("Fecha fin", "fecha_fin")
                ->format(function ($value) {
                    return $value ? $value : '<span class="text-danger">Sin Fecha Fin</span>';
                })->html()
                ->sortable(),
            Column::make("Descripcion", from: "descripcion")
                ->format(function ($value) {
                    $trunacateText = mb_strimwidth($value, 0, 50, ' ...');
                    return $trunacateText;
                })
                ->sortable(),
            Column::make("Material", "material")
                ->format(function ($value) {
                    if ($value) {
                        $trunacateText = mb_strimwidth($value, 0, 50, ' ...');
                        return $trunacateText;
                    } else {
                        return '<span class="text-danger">Sin Materiales</span>';
                    }
                })->html()
                ->sortable(),
            Column::make('Acciones')
                ->label(function ($row) {
                    $id_edificio = $row->id_edificio;
                    $nombreEdificio = $this->NomreEdificio;
                    $id = $row->id;
                    $random = rand(1, 100);
                    return view(
                        'livewire.trabajos-edificio.actions-data-table',
                        compact('id_edificio', 'random', 'id', 'nombreEdificio')
                    )
                        ->with('wire:key', 'TERow-' . $row->id);
                    ;
                }),
        ];
    }

    public function builder(): Builder
    {
        return TrabajoEdificio::query()->where('id_edificio', $this->edificio)->orderBy('id', 'desc');
    }

    public function eliminarTrabajo($id)
    {
        // $this->dispatch('closetModalDelete');
        $trabajoEdificio = TrabajoEdificio::find($id);
        $trabajoEdificio->delete();
    }
}
