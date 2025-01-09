<div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="{{ $idToast }}" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header text-white" id="{{ $tipo }}">
                <strong class="me-auto" id="{{ $tituloToast }}">Titulo Toast</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="{{ $toastMessage }}">
                Toast Message
            </div>
        </div>
    </div>
    <script>
        const toastTrigger{{ $principalKey }} = document.getElementById('{{ $idButton }}')
        const toastLiveExample{{ $principalKey }} = document.getElementById('{{ $idToast }}')

        if (toastTrigger{{ $principalKey }}) {
            const toastBootstrap{{ $principalKey }} = bootstrap.Toast.getOrCreateInstance(
                toastLiveExample{{ $principalKey }})
            toastTrigger{{ $principalKey }}.addEventListener('click', () => {
                toastBootstrap{{ $principalKey }}.show()
            })
        }
    </script>
</div>
