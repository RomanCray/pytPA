<button type="button" class="btn btn-outline-primary mb-3 d-flex align-items-center" wire:click="export">
    @livewire(
        'Icongoogle.Icongoogle',
        [
            'nombre' => 'description',
            'size' => 25,
        ],
        key('iconOther2-')
    )
       Exportar a Word
</button>
