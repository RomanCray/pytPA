<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (count($proyecto->edificios) > 0)
        @foreach ($proyecto->edificios as $edificio)
            <h3>Edificio - {{ $edificio->nombre_edificio }}</h3>
            @if (count($edificio->trabajos) > 0)
                <?php $key = 1; ?>
                @foreach ($edificio->trabajos as $trabajo)
                    <div style="margin-bottom: 8px; font-size: 12px;">
                        <p style="margin: 0">
                            <b style="margin-right: 8px;">{{ $key++ }}) Fecha Trabajo:</b>
                            {{ $trabajo->fecha_inicio ?? $fechaAcual }} - {{ $trabajo->fecha_fin ?? 'Indefinido' }}
                        </p>
                        <div style="margin-left: 15px; margin-bottom: 40px; text-align: justify">
                            <p>
                                <b style="margin-right: 8px;">Descripcón:</b><br>
                                {!! nl2br(e($trabajo->descripcion)) !!}
                            </p>
                            @if ($trabajo->material != null && $trabajo->material != '')
                                <p>
                                    <b style="margin-right: 8px;">Materiales:</b><br>
                                    {!! nl2br(e($trabajo->material)) !!}
                                </p>
                            @endif
                        </div>

                        @php
                            $primerEspacio = [];
                            foreach ($trabajo->fotos as $key => $fotosG) {
                                if (intval($fotosG->size_height) > 200) {
                                    $primerEspacio[$key] = intval($fotosG->size_height);
                                }
                            }
                            rsort($primerEspacio);
                        @endphp

                        @if (count($trabajo->fotos) > 0)
                            <h6 style="margin-left: 15px; ">Fotografias:</h6>
                            <div
                                style="margin-left: 15px; text-align: justify; margin-top: {{ isset($primerEspacio[0]) ? ($primerEspacio[0] - 200) / 3 : '5' }}px">
                                <div style=" display: flex; gap: 10px; clear: both;">

                                    @if (isset($otra))
                                        @foreach ($trabajo->fotos as $foto)
                                            <img src="{{ asset('storage/' . $foto->foto_url) }}"
                                                style="width: 200px; display: block;">
                                        @endforeach
                                    @else
                                        @foreach ($trabajo->fotos as $foto)
                                            <img src="{{ public_path('storage/' . $foto->foto_url) }}"
                                                style="width: 200px;height: 200px; display: block;">
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <i> - Sin trabajos - </i>
            @endif
        @endforeach
    @endif

    <p style="text-align: center; text-decoration: underline;">{{ $proyecto->titulo_proyecto }}</p>
</body>

</html>
