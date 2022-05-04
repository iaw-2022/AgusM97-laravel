<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Image Profile') }}
        </h2>
    </x-slot>

    <x-delete-confirm-modal type="user" />

    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    <img src="data:image/gif;base64,{{ $image->file }}">
</x-app-layout>
