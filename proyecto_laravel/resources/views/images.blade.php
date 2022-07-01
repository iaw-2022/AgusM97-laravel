<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Images') }}
        </h2>
    </x-slot>

    @can('delete')
        <x-delete-confirm-modal type="image" />
    @endcan

    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    <div class="container border rounded table-responsive">
        <table class="table table-hover table-striped caption-top">
            <caption>List of images</caption>
            <thead class="table-dark">
                <th class="col" scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">User</th>
                <th scope="col">Description</th>
                <th scope="col">Tags</th>
                <th scope="col"></th>
            </thead>

            <tbody>
                @foreach ($images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td class="d-flex justify-content-center">
                            <img height="120em" src="data:image/gif;base64,{{ $image->file }}"
                                alt="Image #{{ $image->id }}">
                        </td>
                        <td>
                            <a class="link-primary"
                                href="{{ route('user', ['username' => $image->user->username]) }}">{{ $image->user->username }}</a>
                        </td>
                        <td>{{ $image->description }}</td>
                        <td>
                            @foreach ($image->tags as $tag)
                                <span class="badge rounded-pill bg-primary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td class="align-middle">
                            <div class="btn-group option-buttons" role="group" aria-label="User options">

                                <!-- EDIT BUTTON -->
                                <a type="button" class="btn btn-secondary"
                                    href="{{ route('image', ['id' => $image->id]) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <!-- DELETE BUTTON -->
                                @can('delete')
                                    <button type="button" class="btn btn-danger delete-user" data-bs-toggle="modal"
                                        data-bs-target="#deleteUserModal" onclick="confirmDelete({{ $image->id }})">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                @endcan
                            </div>

                            <!-- DELETE IMAGE FORM -->
                            <form id="form{{ $image->id }}" method="POST"
                                action="/image/{{ $image->id }}/delete">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="d-flex justify-content-center">{{ $images->links() }}</div>
    </div>

</x-app-layout>
