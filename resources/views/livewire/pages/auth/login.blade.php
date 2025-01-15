<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\form;
use function Livewire\Volt\layout;

layout('layouts.guest');

form(LoginForm::class);

$login = function () {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: route('Pry'), navigate: false);
};

?>

<div>
    <!-- Estado de la sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Dirección de correo electrónico -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input wire:model="form.email" id="email" class="form-control" type="email" name="email"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input wire:model="form.password" id="password" class="form-control" type="password"
                name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Recuérdame -->
        <div class="form-check mb-3">
            <input wire:model="form.remember" id="remember" type="checkbox" class="form-check-input" name="remember">
            <label for="remember" class="form-check-label">{{ __('Recuérdame') }}</label>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-secondary">
                    Registrarse
                </a>
            @endif

            <x-primary-button class="btn btn-primary ms-3">
                {{ __('Iniciar sesión') }}
            </x-primary-button>
        </div>

        <div class="d-flex justify-content-end">
            @if (Route::has('password.request'))
                <a class="text-decoration-underline text-muted" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
        </div>
    </form>
</div>
