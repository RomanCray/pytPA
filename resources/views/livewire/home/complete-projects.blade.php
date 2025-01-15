<div class="d-flex justify-content-center">
    <div class="card" style="min-width: 95%;">
        <div class="card-body">
            <div class="text-left">
                <p style="color: gray;">
                    Proyecto: {{ $proyectoF->nombre_proyecto }}
                </p>
            </div>
            <hr>
            {{-- INICIO PROYECTO --}}
            <div>
                {{-- Titulo Proyecto --}}
                @if ($proyectoF->titulo_proyecto != null && $proyectoF->titulo_proyecto != '')
                    <p>
                        Proyecto: {{ $proyectoF->titulo_proyecto }}
                    </p>
                @else
                    <p style="color: red;">
                        <i>- Sin titulo -</i>
                    </p>
                @endif

                {{-- Contenido Proyecto --}}
                @if (count($proyectoF->edificios) > 0)

                    {{-- Inicio Edificios --}}
                    @foreach ($proyectoF->edificios as $edificio)
                        <div class="accordion accordion-flush" id="accordion_edifico_{{ $edificio->id }}">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-edifico_{{ $edificio->id }}" aria-expanded="false"
                                        aria-controls="flush-edifico_{{ $edificio->id }}">
                                        <div class="d-flex">
                                            <input class="form-control myInput" type="text" value="{{ $edificio->nombre_edificio }}" readonly>

                                            <button type="button" class="btn btn-warning">W</button>
                                            <button type="button" class="btn btn-secondary">S</button>
                                        </div>
                                    </div>
                                </h2>

                                <div id="flush-edifico_{{ $edificio->id }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordion_edifico_{{ $edificio->id }}">
                                    <div class="accordion-body">

                                        {{-- Inicio TRabajos Edificio --}}
                                        @if (count($edificio->trabajos) > 0)
                                            <?php $key = 1; ?>
                                            @foreach ($edificio->trabajos as $trabajo)
                                                <div class="accordion accordion-flush"
                                                    id="accordion_TE_{{ $trabajo->id }}">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-TE_{{ $trabajo->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="flush-TE_{{ $trabajo->id }}">
                                                                Titulo Trabajo: {{ $trabajo->titulo_trabajo }}
                                                            </button>
                                                        </h2>

                                                        <div id="flush-TE_{{ $trabajo->id }}"
                                                            class="accordion-collapse collapse"
                                                            data-bs-parent="#accordion_TE_{{ $trabajo->id }}">
                                                            <div class="accordion-body">

                                                                <div style="margin-bottom: 8px; font-size: 12px;">
                                                                    <p style="margin: 0">
                                                                        <b style="margin-right: 8px;">{{ $key++ }})
                                                                            Fecha
                                                                            Trabajo:</b>
                                                                        {{ $trabajo->fecha_inicio ?? $fechaAcual }} -
                                                                        {{ $trabajo->fecha_fin ?? 'Indefinido' }}
                                                                    </p>
                                                                    <div
                                                                        style="margin-left: 15px; margin-bottom: 40px; text-align: justify">
                                                                        <p>
                                                                            <b
                                                                                style="margin-right: 8px;">Descripcón:</b><br>
                                                                            {!! nl2br(e($trabajo->descripcion)) !!}
                                                                        </p>
                                                                        @if ($trabajo->material != null && $trabajo->material != '')
                                                                            <p>
                                                                                <b
                                                                                    style="margin-right: 8px;">Materiales:</b><br>
                                                                                {!! nl2br(e($trabajo->material)) !!}
                                                                            </p>
                                                                        @endif
                                                                    </div>

                                                                    @php
                                                                        $primerEspacio = [];
                                                                        foreach ($trabajo->fotos as $key => $fotosG) {
                                                                            if (intval($fotosG->size_height) > 200) {
                                                                                $primerEspacio[$key] = intval(
                                                                                    $fotosG->size_height,
                                                                                );
                                                                            }
                                                                        }
                                                                        rsort($primerEspacio);
                                                                    @endphp

                                                                    @if (count($trabajo->fotos) > 0)
                                                                        <h6 style="margin-left: 15px; ">Fotografias:
                                                                        </h6>
                                                                        <div
                                                                            style="margin-left: 15px; text-align: justify; margin-top: {{ isset($primerEspacio[0]) ? ($primerEspacio[0] - 200) / 3 : '5' }}px">
                                                                            <div
                                                                                style=" display: flex; gap: 10px; clear: both;">
                                                                                @foreach ($trabajo->fotos as $foto)
                                                                                    <img src="{{ asset('storage/' . $foto->foto_url) }}"
                                                                                        style="width: 200px; display: block;">
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p style="color: red;">
                                                <i> - Sin trabajos - </i>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p style="color: red;">
                        <i>- Sin Edificios -</i>
                    </p>
                @endif

                {{-- Descripcion Final --}}
                @if ($proyectoF->final_description != null && $proyectoF->final_description != '')
                    <p>
                        {{ $proyectoF->final_description }}
                    </p>
                @else
                    <p style="color: red;">
                        <i>- Sin descripción -</i>
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
