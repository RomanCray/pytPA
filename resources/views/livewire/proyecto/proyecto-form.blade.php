<div>
    <form>
        <div class="mb-3">
            <label for="nombre_proyecto" class="form-label">
                Nombre del Proyecto <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" id="nombre_proyecto" wire:model='nombre_proyecto'
                value="{{ $this->nombre_proyecto }}">
            @error('nombre_proyecto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Mas Opciones
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <label for="titulo_proyecto" class="form-label">
                                Titulo Proyecto
                            </label>
                            <textarea wire:model='titulo_proyecto' class="form-control" id="titulo_proyecto" cols="30" rows="1"
                                value="{{ $this->titulo_proyecto }}">
                            </textarea>
                            @error('titulo_proyecto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="final_description" class="form-label">Descripción Final del Proyecto</label>
                            <textarea wire:model='final_description' class="form-control" id="final_description" cols="30" rows="1"
                                value="{{ $this->final_description }}">
                            </textarea>
                            @error('final_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
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
