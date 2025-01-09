<div class="d-flex justify-content-center">
    <div class="card" style="min-width: 95%;">
        <div class="card-body">
            <div class="text-center">
                <h2>
                    Proyecto - {{ $nombreProyecto[0]->nombre_proyecto }}
                </h2>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary mb-3 d-flex align-items-center" data-bs-toggle="modal"
                data-bs-target="#createEdificioModal-0" id="openModal">
                @livewire('Icongoogle.Icongoogle', [
                    'nombre' => 'add_circle',
                    'size' => 24,
                ])
                Añadir Nuevo Edificio
            </button>

            @livewire('Edificio.EdificioTable', ['idProyecto' => $proyect])
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
        key('toast-edificio-deleted-0')
    )

    <!-- Modal -->
    <div wire:ignore.self wire.key='createEdificioModal-00' class="modal fade" id="createEdificioModal-0" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Crear Nuevo Edificio</h1>
                    <button type="button" id="closeCreateEdificioModal-0" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire(
                        'Edificio.EdificioForm',
                        [
                            'proyect_id' => $proyect,
                            'nombre_modal' => 'closeCreateEdificioModal-0',
                            'accion_edificio' => 0,
                        ],
                        key('edificio-form-0')
                    )
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('abrirModal', (event) => {
                document.querySelector('#openModal').click();
            });

            $wire.on('cerrarModalC', (e) => {
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
