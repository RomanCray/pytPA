<div class="d-flex align-items-start flex-wrap flex-md-nowrap justify-content-around">
    <!-- Formulario para añadir nuevo edificio -->
    <div>
        <div class="row g-3">
            <div class="col-auto">
                <label for="nuevoEdificio" class="visually-hidden">Nuevo Edificio</label>
                <input type="text" class="form-control" id="nuevoEdificio" placeholder="Nuevo Edificio"
                    wire:model="nombreEdificio">
            </div>
            <div class="col-auto">
                <button type="button" wire:click="save" class="btn btn-primary mb-3">Añadir</button>
            </div>
        </div>
    </div>
    <div>
        <div class="input-group mb-3">
            <label for="Buscar" class="visually-hidden">Buscar</label>
            <input type="text" class="form-control" id="Buscar" placeholder="Buscar..." wire:model.live="buscar">

            <!-- Botón dinámico -->
            @if ($buscar)
                <button class="btn btn-outline-secondary" type="button" wire:click="clearBuscar">
                    <span class="material-icons-outlined">close</span>
                </button>
            @endif
        </div>

        <style>
            .myInput {
                width: 200px;
            }

            @media (max-width: 768px) {
                .myInput {
                    min-width: 100%;
                }
            }
        </style>
        <div style="min-width: 250px; max-height: 50vh; overflow-y: auto; overflow-x: hidden;">
            @foreach ($edificios as $edificio)
                <div class="d-flex align-items-start flex-wrap flex-md-nowrap mb-2">
                    <!-- Input con el valor del nombre del edificio -->
                    <input class="form-control myInput" type="text"
                        @if ($editingId === $edificio->id) wire:model.defer="editName.{{ $edificio->id }}"
                    @else
                        value="{{ $edificio->edificio_name }}"
                        readonly @endif>

                    <div class="ms-2">
                        <!-- Botones para acciones -->
                        @if ($editingId === $edificio->id)
                            <!-- Botones de Confirmar y Cancelar -->
                            <button type="button"
                                class="btn btn-outline-success rounded-pill btn-sm aling-items-center"
                                wire:click="confirmEdit({{ $edificio->id }})">
                                <span class="material-icons-outlined">check</span>
                            </button>
                            <button type="button"
                                class="btn btn-outline-secondary rounded-pill btn-sm aling-items-center"
                                wire:click="cancelEdit">
                                <span class="material-icons-outlined">close</span>
                            </button>
                        @else
                            <!-- Botones de Editar y Eliminar -->
                            <button type="button"
                                class="btn btn-outline-warning rounded-pill btn-sm aling-items-center"
                                wire:click="edit({{ $edificio->id }})">
                                <span class="material-icons-outlined">edit</span>
                            </button>
                            <button type="button" class="btn btn-outline-danger rounded-pill btn-sm aling-items-center"
                                wire:click="delete({{ $edificio->id }})">
                                <span class="material-icons-outlined">delete</span>
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
