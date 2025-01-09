<div class="d-flex justify-content-center">
    <div class="card" style="min-width: 95%;">
        <div class="card-body">
            <div class="text-center">
                <h2>
                    Mis proyectos
                </h2>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary d-flex align-items-center mb-3 me-2"
                data-bs-toggle="modal" data-bs-target="#modalCreateProject">
                @livewire(
                    'Icongoogle.Icongoogle',
                    [
                        'nombre' => 'add_circle',
                        // 'color' => 'blue',
                        'size' => 24,
                    ],
                    key('icon-proyecto')
                )
                Crear nuevo proyecto
            </button>

            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="modalCreateProject" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Crear Proyecto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                id="closeModalCreateProject" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @livewire('Proyecto.ProyectoForm', ['nombreModal' => 'closeModalCreateProject'], key('proyecto-form-0'))
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- table --}}
            <livewire:Proyecto.ProyectoTable />
        </div>
    </div>

    <button type="button" class="btn btn-primary" id="proyectoDeletedToast1" hidden>
        Show live toast
    </button>
    @livewire(
        'Toast.Toast',
        [
            'idButton' => 'proyectoDeletedToast1',
            'idToast' => 'idToast1',
            'tituloToast' => 'tituloToast1',
            'toastMessage' => 'toastMessage1',
            'principalKey' => 'toast1',
            'tipo' => 'danger',
        ],
        key('toast-proyecto-deleted-1')
    )

    @script
        <script>
            $wire.on('proyectoDeletedF', (e) => {
                document.getElementById('tituloToast1').innerText = e[0].titulo;
                document.getElementById('toastMessage1').innerText = e[0].mensaje;
                const elemento = document.getElementById('danger');
                eliminarClases(elemento);
                document.getElementById('danger').classList.add(e[0].tipo);
                document.getElementById('proyectoDeletedToast1').click()
            });

            $wire.on('proyectoCreatedC', (e) => {
                document.getElementById('tituloToast1').innerText = e[0].titulo;
                document.getElementById('toastMessage1').innerText = e[0].mensaje;
                const elemento = document.getElementById('danger');
                eliminarClases(elemento);
                document.getElementById('danger').classList.add(e[0].tipo);
                document.getElementById('proyectoDeletedToast1').click()
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
