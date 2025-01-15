<div>
    <style>
        .list-group-item.d-flex.align-items-center.justify-content-center button {
            margin: 0 !important;
        }

        .mis-cards {
            width: 220px;
        }

        .mis-cards:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            /* Ajusta los valores según tus necesidades */
            transition: box-shadow 0.2s ease-in-out;
            /* Añade una transición suave */
        }

        @media (max-width: 768px) {
            .mis-cards {
                min-width: 100%;
                margin: 0 !important;
            }
        }
    </style>
    <h2 class="text-center">Proyectos finalizados</h2>
    <hr>
    <div class="d-flex justify-content-start flex-wrap">
        @if (count($proyectosFinalizados) > 0)
            @foreach ($proyectosFinalizados as $item)
                @livewire(
                    'Home.Cards',
                    [
                        'id' => $item->id,
                        'nombre_proyecto' => $item->nombre_proyecto,
                    ],
                    key($item->id)
                )
            @endforeach
        @else
            <h2> No</h2>
        @endif
    </div>

    <script>
        window.location.href = '/proyectos';
    </script>
</div>
