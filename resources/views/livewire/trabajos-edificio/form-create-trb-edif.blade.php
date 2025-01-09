<div>
    <form>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Fecha Inicio</b></label>
            <div class="col-sm-10">
                <input type="date" wire:model="fecha_inicio" class="form-control" name="fecha_inicio">
            </div>
            @error('fecha_inicio')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Fecha Fin</b></label>
            <div class="col-sm-10">
                <input type="date" wire:model="fecha_fin" class="form-control" name="fecha_fin">
            </div>
            @error('fecha_fin')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <div wire:ignore>
                <textarea id="descripcion{{ $generalName }}" class="form-control">{!! nl2br(e($descripcion)) !!}</textarea>
            </div>
            @error('descripcion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="material" class="form-label">Material</label>
            <div wire:ignore>
                <textarea id="material{{ $generalName }}" class="form-control">{!! nl2br(e($material)) !!}</textarea>
            </div>
            @error('material')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex align-items-center">
            <button wire:click='save()' type="button" class="btn btn-primary">
                {{ $id_trabajo_edificio > 0 ? 'Actualizar' : 'Guardar' }}
            </button>
            <div wire:loading>
                <div class="spinner-grow text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </form>

    @script
        <script>
            // Inicializamos TinyMCE
            tinymce.init({
                selector: '#material{{ $generalName }}', // El selector para el campo 'descripcion'
                plugins: 'quickbars', // Plugins a usar
                menubar: false, // Deshabilitamos la barra de menú
                setup: function(editor) { // Configuración del editor
                    // Aquí escuchamos el evento de keydown
                    editor.on('keydown', function(e) {
                        tinymce.triggerSave(); // Guardamos el contenido del editor

                        // Obtenemos el texto que hay en el editor
                        let frase_completa = e.currentTarget.innerText;

                        // Si la tecla es válida, la agregamos al texto
                        if (/^[a-zA-Z0-9.,:;!@#$%^&*()_+=\-?¿¡`~´'"/\\|<>[\]{}]$/.test(e.key)) {
                            frase_completa += e.key;
                        } else if (e.key === 'Backspace') {
                            frase_completa = frase_completa.slice(0, -1);
                        }

                        // Enviamos el texto al componente Livewire
                        $wire.dispatch('textMateriales', {
                            texto: frase_completa
                        });
                    });
                }
            });
        </script>
    @endscript

    @script
        <script>
            // Inicializamos TinyMCE
            tinymce.init({
                selector: '#descripcion{{ $generalName }}', // El selector para el campo 'descripcion'
                plugins: 'quickbars', // Plugins a usar
                menubar: false, // Deshabilitamos la barra de menú
                setup: function(editor) { // Configuración del editor
                    // Aquí escuchamos el evento de keydown
                    editor.on('keydown', function(e) {
                        tinymce.triggerSave(); // Guardamos el contenido del editor

                        // Obtenemos el texto que hay en el editor
                        let frase_completa = e.currentTarget.innerText;

                        // Si la tecla es válida, la agregamos al texto
                        if (/^[a-zA-Z0-9.,:;!@#$%^&*()_+=\-?¿¡`~´'"/\\|<>[\]{}]$/.test(e.key)) {
                            frase_completa += e.key;
                        } else if (e.key === 'Backspace') {
                            frase_completa = frase_completa.slice(0, -1);
                        }

                        // Enviamos el texto al componente Livewire
                        $wire.dispatch('textDescripcion', {
                            texto: frase_completa
                        });
                    });
                }
            });
        </script>
    @endscript

    @script
        <script>
            $wire.on('clearTextDescripcion{{ $generalName }}', function() {
                tinymce.get('descripcion{{ $generalName }}').setContent('');
            });
        </script>
    @endscript

    @script
        <script>
            $wire.on('clearTextMateriales{{ $generalName }}', function() {
                tinymce.get('material{{ $generalName }}').setContent('');
            });
        </script>
    @endscript


    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('{{ $this->nombre_modal }}', (event) => {
                console.log('#{{ $this->nombre_modal }}')
                document.querySelector('#{{ $this->nombre_modal }}').click();
                // Livewire.dispatch('refrescarTabla')
            });
        });
    </script>
</div>
