<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
    {{-- CDN BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Iconos --}}
    <link href="{{ asset('css/material-icons/material-icons.css') }}" rel="stylesheet">

    {{-- Tiny EMC --}}
    <script src="https://cdn.tiny.cloud/1/ktqfdnfz7whuvzauhgpfkkbsup1m8ad858jyrb0tzpz2plda/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- SEELCT2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @livewireStyles
</head>

<body>
    <!-- CDN BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <!-- CDN SWEETALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @rappasoftTableStyles

    <!-- Adds any relevant Third-Party Styles (Used for DateRangeFilter (Flatpickr) and NumberRangeFilter) -->
    @rappasoftTableThirdPartyStyles

    <!-- Adds the Core Table Scripts -->
    @rappasoftTableScripts

    <!-- Adds any relevant Third-Party Scripts (e.g. Flatpickr) -->
    @rappasoftTableThirdPartyScripts

    <header>
        @livewire('Navbar')
    </header>
    <br>
    <style>
        .table-responsive {
            min-height: 300px;
        }
    </style>

    <style>
        .modal-lg-custom {
            max-width: 50%;
            /* Ajusta el ancho según tus necesidades */
        }

        @media (max-width: 768px) {
            .modal-lg-custom {
                min-width: 95%;
            }
        }
    </style>
    <main class="container">
        {{ $slot }}
    </main>

    @livewireScripts

    <script>
        document.addEventListener('livewire:navigate', initializeDropdowns);
        document.addEventListener('livewire:load', initializeDropdowns);
        document.addEventListener('livewire:update', initializeDropdowns);

        function initializeDropdowns() {
            const dropdowns = document.querySelectorAll('.dropdown-toggle');
            dropdowns.forEach((dropdown) => {
                new bootstrap.Dropdown(dropdown);
                console.log('Dropdown inicializado:', dropdown);
            });
        }
    </script>

</body>

</html>
