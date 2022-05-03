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
                <th scope="col">User</th>
                <th scope="col">Description</th>
                <th scope="col">Tags</th>
            </thead>

            <tbody>
                @foreach ($images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td><img height="100px" src="data:image/gif;base64,{{ $image->file }}"></td>
                        <td>
                            <a
                                href="{{ route('user', ['username' => $image->user->username]) }}">{{ $image->user->username }}</a>
                        </td>
                        <td>{{ $image->description }}</td>
                        <td>
                            @foreach ($image->tags as $tag)
                                <span class="badge rounded-pill bg-primary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="d-flex justify-content-center">{{ $images->links() }}</div>
    </div>

</x-app-layout>
