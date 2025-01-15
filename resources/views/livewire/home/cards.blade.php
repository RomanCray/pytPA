<div class="card me-2 mis-cards border-dark-subtle" style="margin-bottom: 5px !important">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center">
            @livewire(
                'Icongoogle.Icongoogle',
                [
                    'nombre' => 'sticky_note_2',
                    'size' => 45,
                ],
                key('complete-proyect-' . $id)
            )
            <p>
                {{ $nombre_proyecto }}
            </p>
        </div>
    </div>
    <ul class="list-group list-group-flush text-center">
        <li class="list-group-item d-flex align-items-center justify-content-center">
            @livewire('Proyecto.ProyectoExportPdf', ['id' => $id], key('ExportPDF-' . $id))
        </li>
        <li class="list-group-item d-flex align-items-center justify-content-center">
            @livewire('Proyecto.ExportWord', ['id_proyecto' => $id], key('ExportWord-' . $id))
        </li>
        <li class="list-group-item bg-dark">
            <a style="color: white !important" class="text-body text-decoration-none" href="{{ route('ver.proyecto', ['proyect' => $id]) }}">
                Ver Proyecto
            </a>
        </li>
    </ul>
</div>
