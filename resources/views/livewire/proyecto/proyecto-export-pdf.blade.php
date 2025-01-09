<div>
    <button type="button" class="btn btn-outline-danger mb-3 d-flex align-items-center" wire:click='preview'>
        @livewire(
            'Icongoogle.Icongoogle',
            [
                'nombre' => 'picture_as_pdf',
                'size' => 25,
            ],
            key('iconOtehr1-')
        )
        Vista Previa PDF
    </button>

    @script
        <script>
            $wire.on('showPdfPreview', function(url) {
                window.open(url, '_blank');
            });
        </script>
    @endscript

</div>
