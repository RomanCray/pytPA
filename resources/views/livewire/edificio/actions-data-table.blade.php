<div class="d-flex align-items-center">
    {{-- @dd($data) --}}
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Acciones
        </button>
        <ul class="dropdown-menu">
            <li>
                <a type="button" class="dropdown-item text-secondary position-relative d-flex align-items-center"
                    href="{{ route($boton2['ruta'], ['id_edificio' => $data->id, 'nombreEdificio' => $data->nombre_edificio]) }}">
                    @livewire(
                        'Icongoogle.Icongoogle',
                        [
                            'nombre' => $boton2['nombreIcono'],
                            'size' => $boton2['size'],
                        ],
                        key('icon2-' . $data->id)
                    )
                    {{ $boton2['nombre'] }}
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
                        {{ $catidadTabajos }}
                        <span class="visually-hidden">sin trabajos</span>
                    </span>
                </a>
            </li>
            <li>
                {{-- Boton 1 --}}
                <button type="button" class="dropdown-item text-info d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#create_TE_target_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}">
                    @livewire(
                        'Icongoogle.Icongoogle',
                        [
                            'nombre' => $boton1['nombreIcono'],
                            'size' => $boton1['size'],
                        ],
                        key('icon1-TE_target_' . $nombreBase . '_' . $data->id . '_' . $random)
                    )
                    {{ $boton1['nombre'] }}
                </button>
            </li>
            <li>
                {{-- Boton 3 --}}
                <button type="button" class="dropdown-item text-warning d-flex align-items-center"
                    data-bs-toggle="modal"
                    data-bs-target="#edit_target_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}"
                    id="edit_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}">
                    @livewire(
                        'Icongoogle.Icongoogle',
                        [
                            'nombre' => $boton3['nombreIcono'],
                            'size' => 24,
                        ],
                        key('icon-edit-' . $data->id . $random)
                    )
                    Editar Edificio
                </button>
            </li>
            <li>
                {{-- Boton 4 --}}
                <button type="button" class="dropdown-item text-danger d-flex align-items-center"
                    data-bs-toggle="modal"
                    data-bs-target="#delete_target_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}">
                    @livewire(
                        'Icongoogle.Icongoogle',
                        [
                            'nombre' => $boton4['nombreIcono'],
                            'size' => $boton1['size'],
                        ],
                        key('icon1-delete-edificio-' . $data->id)
                    ) {{ $boton4['nombre'] }} </button>
            </li>
        </ul>
    </div>

    <!-- Modal Boton 1 -->
    <div wire:ignore.self wire.key='key_TE_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}'
        class="modal fade" id="create_TE_target_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir un trabajo al edificio -
                        {{ $data->nombre_edificio }} </h1>
                    <button type="button"
                        id="close_TE_target_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire(
                        'TrabajosEdificio.FormCreateTrbEdif',
                        [
                            'id_edificio' => $data->id,
                            'nombre_modal' => 'close_TE_target_' . $nombreBase . '_' . $data->id . '_' . $random,
                            'generalName' => 'TE_' . $nombreBase . '_' . $data->id . '_' . $random,
                            'inOtehrVist' => true,
                        ],
                        key('vistaNoOriginal-TE_' . $nombreBase . '_' . $data->id . '_' . $random)
                    )
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Boton 3 -->
    <div wire:ignore.self wire.key='key_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}'
        class="modal fade" id="edit_target_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Editar Edificio</h1>
                    <button type="button"
                        id="close_edit_target_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    @livewire(
                        'Edificio.EdificioForm',
                        [
                            'proyect_id' => $idProyecto,
                            'nombre_modal' => 'close_edit_target_' . $nombreBase . '_' . $data->id . '_' . $random,
                            'accion_edificio' => $data->id,
                            'nombre_edificio' => $data->nombre_edificio,
                        ],
                        key('edificio-edit_target-' . $nombreBase . '-' . $data->id . '-' . $random)
                    )

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Boton 4 -->
    <div wire:ignore.self wire.key='key_delete{{ $nombreBase }}_{{ $data->id }}_{{ $random }}'
        class="modal fade" id="delete_target_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-danger fs-5" id="exampleModalLabel"> Eliminar Edificio</h1>
                    <button type="button"
                        id="close_delete_target_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <p>¿Estás seguro de eliminar el Edificio "{{ $data->nombre_edificio }}" ?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button
                        wire:click='delete_edificio({{ $data->id }},"close_delete_target_{{ $nombreBase }}_{{ $data->id }}_{{ $random }}")'
                        type="button" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>
