<div>
    <div class="dropdown dropend">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Acciones
        </button>
        <ul class="dropdown-menu">
            <li>
                <button type="button" class="dropdown-item d-flex aligh-items-center" data-bs-toggle="modal"
                    data-bs-target="#staticBackdropImages{{ $id }}">
                    @livewire(
                        'Icongoogle.Icongoogle',
                        [
                            'nombre' => 'photo_camera',
                        ],
                        key('iconImage-' . $id)
                    )
                    Imagenes
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex text-warning aligh-items-center"
                    data-bs-toggle="modal" data-bs-target="#row_TE_modal_{{ $id }}_{{ $random }}">
                    @livewire(
                        'Icongoogle.Icongoogle',
                        [
                            'nombre' => 'edit',
                        ],
                        key('icon_edit_row_' . $id)
                    )
                    Editar
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item text-danger d-flex aligh-items-center"
                    data-bs-toggle="modal" data-bs-target="#staticBackdropDelete{{ $id }}">
                    @livewire(
                        'Icongoogle.Icongoogle',
                        [
                            'nombre' => 'delete',
                        ],
                        key('iconDelete-' . $id)
                    )
                    Eliminar
                </button>
            </li>
        </ul>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="staticBackdropDelete{{ $id }}" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger" id="staticBackdropLabel">
                        Eliminar Trabajo #{{ $id }}
                    </h1>
                    <button type="button" id="closeModalD{{ $id_edificio . '-' . $id }}" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Esta seguro que desea eliminar el trabajo #{{ $id }} del Edificio
                        {{ $nombreEdificio }}.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        wire:click='eliminarTrabajo({{ $id }})'>Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div wire:ignore.self wire:key='key_TE_modal_{{ $id }}_{{ $random }}' class="modal fade" id="row_TE_modal_{{ $id }}_{{ $random }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" id="close_row_TE_modal_{{ $id }}_{{ $random }}" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire(
                        'TrabajosEdificio.FormCreateTrbEdif',
                        [
                            'nombre_modal' => 'close_row_TE_modal_' . $id . '_' . $random,
                            'generalName' => 'TE_' . $id . '-' . $random,
                            'id_edificio' => $id_edificio,
                            'id_trabajo_edificio' => $id,
                        ],
                        key('TE_' . $id . '-' . $id_edificio . '-'. $random)
                    )
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Images -->
    <div class="modal fade" id="staticBackdropImages{{ $id }}" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> --}}
                    <button type="button" id="closeModalImages{{ $id_edificio . '-' . $id }}" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire(
                        'PruebasTabajos.PruebasTrabajo',
                        [
                            'trabajoEdificio' => $id,
                            'tituloM' => 'Detalle ' . $id,
                            'nombre_modal' => 'closeModalImages' . $id_edificio . '-' . $id,
                        ],
                        key('vistaTableImage-' . $id_edificio . '-' . $id)
                    )
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
