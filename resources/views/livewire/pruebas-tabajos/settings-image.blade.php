<div class="position-relative">
    <img src="{{ asset('storage/' . $foto_url) }}" style="width: {{ $size_width }}px; height: {{ $size_height }}px;">
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark" style="cursor: pointer">
        <div class="btn-group dropstart">
            <button wire:ignore type="button" class="btn btn-sm dropdown-toggle d-flex align-items-center"
                data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                @livewire(
                    'Icongoogle.Icongoogle',
                    [
                        'nombre' => 'settings_photo_camera',
                        'size' => 15,
                        'clases' => '',
                        'color' => 'white',
                    ],
                    key('principal-icon-images-' . $imageId)
                )
                <span class="visually-hidden">unread messages</span>
            </button>
            <ul class="dropdown-menu position-absolute" style="min-width: 250px;">
                <li>
                    <div class="accordion" id="acordeon-ancho-{{ $imageId }}-{{ $random }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-image-ancho-{{ $imageId }}-{{ $random }}"
                                    aria-expanded="true"
                                    aria-controls="collapse-image-ancho-{{ $imageId }}-{{ $random }}">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <p class="m-0">Ancho</p>
                                        <div class="me-1">
                                            {{ $size_width }}px
                                        </div>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapse-image-ancho-{{ $imageId }}-{{ $random }}"
                                class="accordion-collapse collapse"
                                data-bs-parent="#acordeon-ancho-{{ $imageId }}-{{ $random }}">
                                <div class="p-2">
                                    <div class="mb-3 dropdown-item p-0">
                                        <div class="mt-1 d-flex align-items-center justify-content-around">
                                            <!-- Input de tipo range para el slider -->
                                            <input type="range" id="width" class="form-control-range"
                                                wire:model.live="size_width" min="245" max="700"
                                                step="1">
                                            <button type="button" wire:click='saveAncho'
                                                class="btn btn-outline-success rounded-pill btn-sm d-flex align-items-center">
                                                @livewire(
                                                    'Icongoogle.Icongoogle',
                                                    [
                                                        'nombre' => 'check',
                                                        'size' => 15,
                                                        'clases' => '',
                                                    ],
                                                    key('sucees-ancho-' . $imageId . '-' . $random)
                                                )
                                            </button>
                                            <button type="button" wire:click='restoreAncho'
                                                class="btn btn-outline-secondary rounded-pill btn-sm d-flex align-items-center">
                                                @livewire(
                                                    'Icongoogle.Icongoogle',
                                                    [
                                                        'nombre' => 'close',
                                                        'size' => 15,
                                                        'clases' => '',
                                                    ],
                                                    key('danger-ancho-' . $imageId . '-' . $random)
                                                )
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="accordion" id="acordeon-alto-{{ $imageId }}-{{ $random }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-image-alto-{{ $imageId }}-{{ $random }}"
                                    aria-expanded="true"
                                    aria-controls="collapse-image-alto-{{ $imageId }}-{{ $random }}">
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <p class="m-0">Alto</p>
                                        <div class="me-1">
                                            {{ $size_height }}px
                                        </div>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapse-image-alto-{{ $imageId }}-{{ $random }}"
                                class="accordion-collapse collapse"
                                data-bs-parent="#acordeon-alto-{{ $imageId }}-{{ $random }}">
                                <div class="p-2">
                                    <div class="mb-3 dropdown-item p-0">
                                        <div class="mt-1 d-flex align-items-center justify-content-around">
                                            <!-- Input de tipo range para el slider -->
                                            <input type="range" id="width" class="form-control-range"
                                                wire:model.live="size_height" min="270" max="700"
                                                step="1">
                                            <button type="button" wire:click='saveAlto'
                                                class="btn btn-outline-success rounded-pill btn-sm d-flex align-items-center">
                                                @livewire(
                                                    'Icongoogle.Icongoogle',
                                                    [
                                                        'nombre' => 'check',
                                                        'size' => 15,
                                                        'clases' => '',
                                                    ],
                                                    key('sucees-alto-' . $imageId . '-' . $random)
                                                )
                                            </button>
                                            <button type="button" wire:click='restoreAlto'
                                                class="btn btn-outline-secondary rounded-pill btn-sm d-flex align-items-center">
                                                @livewire(
                                                    'Icongoogle.Icongoogle',
                                                    [
                                                        'nombre' => 'close',
                                                        'size' => 15,
                                                        'clases' => '',
                                                    ],
                                                    key('danger-alto-' . $imageId . '-' . $random)
                                                )
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li class="d-felx justify-content-center">
                    <button class="dropdown-item d-flex align-items-center text-danger"
                        wire:click='eliminarImagenes({{ $imageId }})'>
                        @livewire(
                            'Icongoogle.Icongoogle',
                            [
                                'nombre' => 'hide_image',
                                'size' => 20,
                                'clases' => '',
                            ],
                            key('delete-image-' . $imageId . '-' . $random)
                        )
                        Eliminar
                    </button>
                </li>
            </ul>
        </div>
    </span>
</div>
