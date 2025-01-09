<?php


namespace App\Livewire\Edificio;

use App\Livewire\Edificio\Edificio as EdificioPrincipal;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Edificio;
use App\Models\Proyecto;
use App\Models\TrabajoEdificio;
use Illuminate\Database\Eloquent\Builder;


class EdificioTable extends DataTableComponent
{
    protected $model = Edificio::class;
    public $idProyecto;
    public function mount($idProyecto): void
    {
        $this->idProyecto = $idProyecto;
    }
    public function getListeners()
    {
        return [
            'refreshTable' => '$refresh',
        ];
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->searchIsEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre edificio", "nombre_edificio")
                ->sortable()->searchable(),
            Column::make("Acciones")
                ->label(function ($row) {
                    $verificarEdificio = TrabajoEdificio::where('id_edificio', $row->id)->exists();

                    if ($verificarEdificio) {
                        $catidadTabajos = TrabajoEdificio::where('id_edificio', $row->id)->count();
                    } else {
                        $catidadTabajos = 0;
                    }

                    $boton1 = [
                        'color' => 'blue',
                        'size' => '30px',
                        'nombreIcono' => 'note_add',
                        'nombre' => 'Añadir Trabajo',
                    ];

                    $boton2 = [
                        'color' => 'blue',
                        'size' => '30px',
                        'nombreIcono' => 'visibility',
                        'nombre' => 'Ver Trabajos del Edificio ',
                        'ruta' => 'crear.trabajo.edificio',
                    ];

                    $boton3 = [
                        'nombreIcono' => 'edit',
                        'nombre' => 'Editar Edificio',
                    ];

                    $boton4 = [
                        'nombreIcono' => 'delete',
                        'nombre' => 'Eliminar Edificio',
                    ];

                    return view('livewire.edificio.actions-data-table', [
                        'data' => $row,
                        'idProyecto' => $this->idProyecto,
                        'catidadTabajos' => $catidadTabajos,
                        'nombreBase' => 'edificio_data_table',
                        'boton1' => $boton1,
                        'boton2' => $boton2,
                        'boton3' => $boton3,
                        'boton4' => $boton4,
                        'random' => rand(1, 1000),
                    ])->with('wire:key', 'row-' . $row->id);
                }),
        ];
    }

    // Filtrar los datos basados en id_proyecto
    public function builder(): Builder
    {
        return Edificio::query()->where('id_proyecto', $this->idProyecto);
    }

    public function delete_edificio($id,$nombreModal)
    {
        $edificio = Edificio::find($id);

        $informacion = [
            'titulo' => 'Edificio eliminado',
            'mensaje' => 'El Edificio ' . $edificio->nombre_edificio . ' ha sido eliminado correctamente',
            'tipo' => 'bg-danger',
            'nombreModal' => $nombreModal
        ];

        $edificio->delete();
        $this->dispatch('cerrarModal', $informacion)->to(EdificioPrincipal::class);
    }
}


