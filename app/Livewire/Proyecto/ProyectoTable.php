<?php

namespace App\Livewire\Proyecto;

use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Proyecto as ProyectoModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class ProyectoTable extends DataTableComponent
{
    protected $model = ProyectoModel::class;
    public ?int $perPage = 5;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
        $this->setSearchEnabled();
        $this->perPageAccepted = [5, 10, 15, 50, 100];
        $this->perPage = 5;
        $this->searchFilterDebounce = 600;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre proyecto", "nombre_proyecto")
                ->sortable()->searchable(),
            Column::make("Titulo Doc.", "titulo_proyecto")
                ->sortable()
                ->searchable()
                ->format(function ($value) {
                    return $value ? $value : '<span class="text-danger">Sin Titulo</span>';
                })
                ->html(),
            Column::make("Descripción Final Doc.", "final_description")
                ->sortable()
                ->searchable()
                ->format(function ($value) {
                    return $value ? $value : '<span class="text-danger">Sin Descripcion</span>';
                })
                ->html(),
            BooleanColumn::make('status')
                ->setSuccessValue(true)->sortable(),
            Column::make("Acciones")
                ->label(function ($row) {
                    $boton1 = [
                        'color' => '',
                        'size' => '30px',
                        'nombreIcono' => 'apartment',
                        'nombre' => 'Edificios',
                        'data' => $row,
                        'ruta' => 'crear.edificio',
                    ];

                    $estado = $row->status;

                    $boton2 = [
                        'color' => '',
                        'size' => '30px',
                        'nombreIcono' => 'picture_as_pdf',
                        'nombre' => 'Exportar PDF',
                        // 'ruta' => $ruta,
                    ];

                    $random = rand(1, 1000);

                    return view('livewire.proyecto.actions-data-table', [
                        'boton1' => $boton1,
                        'boton2' => $boton2,
                        'estado' => $estado,
                        'random' => $random
                    ])->with('wire:key', 'row-' . $row->id);
                }),
        ];
    }

    public function builder(): Builder
    {
        return ProyectoModel::query()->where('user', Auth::user()->id);
    }

    public function redireccionar($id, $ruta)
    {
        if (!$ruta) {
            session()->flash('error', 'La ruta proporcionada no es válida.');
            return;
        }

        $url = route($ruta, ['proyect' => $id]);
        return redirect()->to($url);
    }

    public function deleteProyect($id)
    {
        $proyecto = ProyectoModel::find($id);

        $informacion = [
            'titulo' => 'Proyecto eliminado',
            'mensaje' => 'El proyecto ' . $proyecto->nombre_proyecto . ' ha sido eliminado correctamente',
            'tipo' => 'bg-danger'
        ];

        $proyecto->delete();
        $this->dispatch('proyectoDeleted', $informacion)->to(Proyecto::class);
    }

    #[On('acciotoinRefresTable')]
    public function acciotoinRefresTable()
    {
        $this->dispatch('refreshDatatable');
        return true;
    }
}
