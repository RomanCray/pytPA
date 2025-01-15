<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark " data-bs-theme="dark">
    <div class="container-fluid">
        <h3 class="navbar-brand d-flex align-items-center" wire:click='goHome' style="cursor: pointer">
            @livewire('Icongoogle.Icongoogle', [
                'nombre' => 'face',
                // 'color' => 'blue',
                'size' => 44,
            ])
            <div class="ms-2">
                ProyectoPA
            </div>
        </h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a wire:navigate.prefetch class="nav-link active d-flex align-items-center" aria-current="page" href="{{ route('Pry') }}">
                        @livewire(
                            'Icongoogle.Icongoogle',
                            [
                                'nombre' => 'home',
                                // 'color' => 'blue',
                                'size' => 24,
                            ],
                            key('Ic0')
                        )
                        <div class="ms-1">
                            Mis Proyecto
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate.prefetch class="nav-link active d-flex align-items-center" aria-current="page"
                        href="{{ route('settings', ['navigate' => true]) }}">
                        @livewire(
                            'Icongoogle.Icongoogle',
                            [
                                'nombre' => 'settings',
                                // 'color' => 'blue',
                                'size' => 24,
                            ],
                            key('Ic1')
                        )
                        <div class="ms-1">
                            Configuraciones
                        </div>
                    </a>
                </li>
            </ul>
            <div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @livewire(
                                'Icongoogle.Icongoogle',
                                [
                                    'nombre' => 'person',
                                    // 'color' => 'blue',
                                    'size' => 24,
                                ],
                                key('Ic2')
                            )
                            {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a wire:navigate.prefetch class="dropdown-item" href="{{ route('profile') }}">
                                    Perfil
                                </a>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item" wire:click='cerrarSesion()'>
                                    Cerrar Sesión
                                </button>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
