<div>
    @if ($exitenImages)
        <div class="card">
            <div class="card-header">Imágenes Guardadas</div>
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-around">
                    @foreach ($ImagesSaved as $imagenesG)

                        @livewire(
                            'PruebasTabajos.SettingsImage',
                            ['id' => $imagenesG->id],
                            key($imagenesG->unique_key)
                        )
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="alert alert-warning">* No olvides guardar las imágenes</div>

    <form wire:submit.prevent="save">
        <input type="file" class="form-control" wire:model="images" multiple accept="image/*">
        @error('images.*')
            <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit" class="btn btn-outline-primary m-2">Guardar Imágenes</button>
    </form>

    @if ($images)
        <div class="card mt-3">
            <div class="card-header">Vista Previa de Imágenes</div>
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-around">
                    @foreach ($images as $image)
                        <img src="{{ $image->temporaryUrl() }}" style="width: 250px;">
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
