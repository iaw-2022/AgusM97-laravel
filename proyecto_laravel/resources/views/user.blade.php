<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User: ') . $user->username }}
        </h2>
    </x-slot>
</x-app-layout>
