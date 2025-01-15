<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;

use function Livewire\Volt\rules;
use function Livewire\Volt\state;

state(['password' => '']);

rules(['password' => ['required', 'string', 'current_password']]);

$deleteUser = function (Logout $logout) {
    $this->validate();

    tap(Auth::user(), $logout(...))->delete();

    $this->redirect('/', navigate: true);
};

?>

<section class="space-y-3">
    <header>
        <h2 class="text-lg fw-medium text-dark">
            {{ __('Eliminar cuenta') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __('Una vez que tu cuenta sea eliminada, todos sus recursos y datos serán eliminados permanentemente. Antes de eliminar tu cuenta, por favor descarga cualquier dato o información que desees conservar.') }}
        </p>
    </header>

    {{-- ELIMINAR --}}
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletion">
        {{ __('Eliminar cuenta') }}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="confirmUserDeletion" tabindex="-1" aria-labelledby="confirmUserDeletionLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmUserDeletionLabel">
                        {{ __('¿Estás seguro de que deseas eliminar tu cuenta?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">
                        {{ __('Una vez que tu cuenta sea eliminada, todos sus recursos y datos serán eliminados permanentemente. Por favor, ingresa tu contraseña para confirmar que deseas eliminar tu cuenta permanentemente.') }}
                    </p>
                    <form wire:submit="deleteUser">
                        <div class="mb-3">
                            <x-input-label for="password" value="{{ __('Contraseña') }}" class="sr-only" />
                            <x-text-input wire:model="password" id="password" name="password" type="password"
                                class="form-control" placeholder="{{ __('Contraseña') }}" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('Cancelar') }}</button>
                            <button type="submit" class="btn btn-danger ms-3">{{ __('Eliminar cuenta') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
