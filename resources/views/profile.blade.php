<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold text-xl text-dark leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container space-y-3">
            <div class="p-4 bg-white bg-dark shadow rounded">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="p-4 bg-white bg-dark shadow rounded">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="p-4 bg-white bg-dark shadow rounded">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
