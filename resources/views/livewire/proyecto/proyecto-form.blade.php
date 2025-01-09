<div>
    <form>
        <div class="mb-3">
            <label for="nombre_proyecto" class="form-label">Nombre del Proyecto</label>
            <input type="text" class="form-control" id="nombre_proyecto" wire:model='nombre_proyecto'
                value="{{ $this->nombre_proyecto }}">
            @error('nombre_proyecto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="titulo_proyecto" class="form-label">Descripción Final del Proyecto</label>
            <textarea wire:model='titulo_proyecto' class="form-control" id="titulo_proyecto" cols="30" rows="1"
                value="{{ $this->titulo_proyecto }}">
            {{-- <input type="text"
                 > --}}

            </textarea>
            @error('titulo_proyecto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex align-items-center">
            <button wire:click='save()' type="button" class="btn btn-primary">{{ $this->accion }}</button>
            <div wire:loading class="spinner-grow text-dark" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </form>

    @script
        <script>
            $wire.on('saveFinished', (e) => {
                let nombreModal = (e[0])
                const modal = document.getElementById(nombreModal);
                modal.click();
                // Livewire.dispatch('acciotoinRefresTable');
            });
        </script>
    @endscript
</div>
