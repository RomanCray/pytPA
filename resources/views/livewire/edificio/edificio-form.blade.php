<div wire.key='key_{{ $nombre_modal }}'>
    <form>
        <div wire:ignore class="mb-3">
            <select class="settingEdificioSelect form-control" name="state">
                <option value="" selected>- Selecione -</option>
                @foreach ($listaEdificios as $edif)
                    <option value="{{ $edif->edificio_name }}">{{ $edif->edificio_name }}</option>
                @endforeach
            </select>
            @error('nombre_edificio')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex align-items-center">
            <button type="button" wire:click='save' class="btn btn-primary mt-3">
                {{ $this->accion_edificio == 0 ? 'Crear' : 'Modificar' }} Edificio
            </button>
            <div wire:loading class="spinner-grow text-dark" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </form>

    <script>
        function initializeSelect2() {
            $('.settingEdificioSelect').select2({
                dropdownParent: $('#createEdificioModal-0'), 
                width: '100%',
                theme: 'bootstrap4',
            });

            $('.settingEdificioSelect').on('change', function() {
                var edificioSelecionado = $(this).val();
                @this.set('nombre_edificio', edificioSelecionado);
            });
        }

        $(document).ready(function() {
            initializeSelect2();
        });

        document.addEventListener('livewire:load', function() {
            Livewire.hook('message.processed', (message, component) => {
                initializeSelect2();
            });
        });

        document.addEventListener('livewire:init', () => {
            Livewire.on('post-created', () => {
                $('.settingEdificioSelect').val('').trigger('change');
            });
        });
    </script>

    <style>
        .select2-container {
            z-index: 1055 !important;
        }

        .select2-container--bootstrap4 .select2-dropdown {
            z-index: 1055 !important;
        }

        .select2-container--bootstrap4 .select2-selection {
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            height: calc(2.25rem + 2px);
        }

        .select2-container--bootstrap4 .select2-selection__rendered {
            color: #495057;
            padding: 0.375rem 0.75rem;
        }

        .select2-container--bootstrap4 .select2-selection__arrow {
            height: calc(2.25rem + 2px);
        }
    </style>
</div>
