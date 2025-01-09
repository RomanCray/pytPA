<div class="d-flex justify-content-center">
    <div class="card" style="min-width: 95%;">
        <div class="card-body">
            <div class="text-center">
                <h2>
                    #{{ $proyectoId->id }} Proyecto {{ $proyectoId->nombre_proyecto }} - Ed. {{ $nombreEdificio }}
                </h2>
            </div>
            <br>
            <br>
            <div class="d-flex flex-wrap justify-content-between">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary mb-3 me-2 d-flex align-items-center"
                    data-bs-toggle="modal" data-bs-target="#TE_target_modal{{ $proyectoId->id }}-{{ $id_edificio }}">
                    @livewire(
                        'Icongoogle.Icongoogle',
                        [
                            'nombre' => 'add',
                            'size' => 25,
                        ],
                        key('iconOtehr0-')
                    )
                    Nuevo Trabajo para el Edificio ({{ $nombreEdificio }})
                </button>

                @if ($proyectoId->status)
                    <div class="d-flex flex-wrap">
                        <div class="me-1">
                            @livewire('Proyecto.ProyectoExportPdf', ['id' => $proyectoId->id])
                        </div>

                        @livewire('Proyecto.ExportWord', ['id_proyecto' => $proyectoId->id], key($proyectoId->id))
                    </div>
                @else
                    <button type="button" class="btn btn-success mb-3 d-flex align-items-center"
                        wire:click='terminarProyecto({{ $proyectoId->id }})'>
                        @livewire(
                            'Icongoogle.Icongoogle',
                            [
                                'nombre' => 'thumb_up',
                                'size' => 25,
                            ],
                            key('iconOtehr2-')
                        )
                        Terminar Proyecto
                    </button>
                @endif
            </div>

            @livewire('TrabajosEdificio.TrabajosEdificioTable', ['NomreEdificio' => $nombreEdificio, 'edificio' => $id_edificio], key('traEdi-' . $id_edificio))

            <!-- Modal -->
            <div wire:ignore.self wire:key='TE_modal_0_{{ $proyectoId->id }}-{{ $id_edificio }}' class="modal fade"
                id="TE_target_modal{{ $proyectoId->id }}-{{ $id_edificio }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg-custom">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir Trabajo</h1>
                            <button type="button" id="close_TE_target_modal{{ $proyectoId->id }}-{{ $id_edificio }}"
                                class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @livewire(
                                'TrabajosEdificio.FormCreateTrbEdif',
                                [
                                    'nombre_modal' => 'close_TE_target_modal' . $proyectoId->id . '-' . $id_edificio,
                                    'generalName' => 'TE_' . $proyectoId->id . '-' . $id_edificio,
                                    'id_edificio' => $id_edificio,
                                ],
                                key('0_TE_' . $proyectoId->id . '-' . $id_edificio)
                            )
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-primary" id="EdificioToast1" hidden>
                Show live toast
            </button>
            @livewire(
                'Toast.Toast',
                [
                    'idButton' => 'EdificioToast1',
                    'idToast' => 'idToast1',
                    'tituloToast' => 'tituloToast1',
                    'toastMessage' => 'toastMessage1',
                    'principalKey' => 'toast1',
                    'tipo' => 'danger',
                ],
                key('toast-TE-deleted-0')
            )
        </div>
    </div>

    @script
        <script>
            $wire.on('actualizacionProyecto', () => {
                console.log(event); // Verificar que el evento llega
                swal({
                    title: "Muy bien!",
                    text: "Estado actualizado, puedes descargar tu archivo en PDF",
                    icon: "success",
                    buttons: false, // Oculta los botones
                    timer: 3000 // El tiempo en milisegundos antes de cerrarse automáticamente (3 segundos)
                });
            });

            $wire.on('refrescaTE', (event) => {
                location.reload();
            });

            $wire.on('cerrarModalTE', (e) => {
                document.querySelector('#' + e[0].nombreModal).click();
                document.getElementById('tituloToast1').innerText = e[0].titulo;
                document.getElementById('toastMessage1').innerText = e[0].mensaje;
                const elemento = document.getElementById('danger');
                eliminarClases(elemento);
                document.getElementById('danger').classList.add(e[0].tipo);
                document.getElementById('EdificioToast1').click()
            });

            function eliminarClases(elemento) {
                const clasesAEliminar = ['bg-danger', 'bg-info', 'bg-success'];
                clasesAEliminar.forEach(clase => {
                    if (elemento.classList.contains(clase)) {
                        elemento.classList.remove(clase);
                    }
                });
            }
        </script>
    @endscript
</div>
