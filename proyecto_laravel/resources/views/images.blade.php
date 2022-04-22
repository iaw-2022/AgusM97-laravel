<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Images') }}
        </h2>
    </x-slot>

    <div class="container border rounded">
        <table class="table table-hover table-striped caption-top">
            <caption>List of images</caption>
            <thead class="table-dark">
                <th class="col" scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">User</th>
            </thead>

            <tbody>
                @foreach ($images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td><img height="100px" src="data:image/gif;base64,{{ $image->file }}"></td>
                        <td>{{ $image->name }}</td>
                        <td>{{ $image->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</x-app-layout>