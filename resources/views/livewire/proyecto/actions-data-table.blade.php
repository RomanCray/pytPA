<div>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Acciones
        </button>
        <ul class="dropdown-menu">
            @if ($estado)
                <li class="d-flex justify-content-center">
                    @livewire('Proyecto.ProyectoExportPdf', ['id' => $boton1['data']->id])
                </li>
                <li class="d-flex justify-content-center">
                    @livewire('Proyecto.ExportWord', ['id_proyecto' => $boton1['data']->id], key($boton1['data']->id))
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
            @endif
            <li>
                <button type="button" class="dropdown-item text-secondary d-flex align-items-center mb-3 me-2"
                    wire:click.prevent="redireccionar({{ $boton1['data']->id }}, '{{ $boton1['ruta'] }}')">
                    @livewire(
                        'Icongoogle.Icongoogle',
                        [
                            'nombre' => $boton1['nombreIcono'],
                            'size' => $boton1['size'],
                        ],
                        key('icon-edificio-' . $boton1['data']->id)
                    )
                    {{ $boton1['nombre'] }}
                </button>
            </li>

            <li>
                <button type="button" class="dropdown-item text-warning d-flex align-items-center mb-3 me-2"
                    data-bs-toggle="modal"
                    data-bs-target="#modalCreateProjectTable{{ $boton1['data']->id }}{{ $random }}">
                    @livewire(
                        'Icongoogle.Icongoogle',
                        [
                            'nombre' => 'edit',
                            // 'color' => 'blue',
                            'size' => $boton1['size'],
                        ],
                        key('icon-proyecto-' . $boton1['data']->id)
                    )
                    Editar proyecto
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item text-danger d-flex align-items-center mb-3 me-2"
                    data-bs-toggle="modal"
                    data-bs-target="#modalDeleteProjectTable{{ $boton1['data']->id }}{{ $random }}">
                    @livewire(
                        'Icongoogle.Icongoogle',
                        [
                            'nombre' => 'delete',
                            // 'color' => 'blue',
                            'size' => $boton1['size'],
                        ],
                        key('icon-proyecto-delete-' . $boton1['data']->id)
                    )
                    Eliminar proyecto
                </button>
            </li>
        </ul>
    </div>
    {{-- MODAL CREATE | EDIT --}}
    <div wire:ignore.self wire:key="create-{{ $boton1['data']->id }}{{ $random }}" class="modal fade"
        id="modalCreateProjectTable{{ $boton1['data']->id }}{{ $random }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Editar Proyecto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="closeModalCreateProjectTable{{ $boton1['data']->id }}{{ $random }}"></button>
                </div>
                <div class="modal-body">
                    @livewire(
                        'Proyecto.ProyectoForm',
                        [
                            'nombreModal' => 'closeModalCreateProjectTable' . $boton1['data']->id . $random,
                            'proyecto' => $boton1['data']->id,
                        ],
                        key('proyecto-form-' . $boton1['data']->id . $random)
                    )
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DELETE --}}
    <div wire:ignore.self wire:key="delete-{{ $boton1['data']->id }}{{ $random }}" class="modal fade"
        id="modalDeleteProjectTable{{ $boton1['data']->id }}{{ $random }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-danger fs-5">Eliminar Proyecto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="closeModalDeleteProjectTable{{ $boton1['data']->id }}{{ $random }}"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de eliminar el proyecto "{{ $boton1['data']->nombre_proyecto }}"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click='deleteProyect({{ $boton1['data']->id }})' type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>
