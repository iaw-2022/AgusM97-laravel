<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <x-user-delete-confirm />

    <!-- TABLE -->
    <div class="container border rounded">
        <table class="table table-hover table-striped caption-top">
            <caption>List of users</caption>
            <thead class="table-dark">
                <th class="col" scope="col">ID</th>
                <th scope="col">Picture</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Email verified at</th>
                <th scope="col"></th>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <x-profile-picture :user="$user" />
                        </td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->email_verified_at }}</td>
                        <td>
                            <div class="btn-group option-buttons" role="group" aria-label="User options">

                                <!-- EDIT BUTTON -->
                                <a type="button" class="btn btn-secondary"
                                    href="{{ route('user', ['username' => $user->username]) }}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <!-- DELETE BUTTON -->
                                <button type="button" class="btn btn-danger delete-user" data-bs-toggle="modal"
                                    data-bs-target="#deleteUserModal" onclick="confirmUserDelete({{ $user->id }})">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </div>

                            <!-- DELETE FORM -->
                            <form id="form{{ $user->id }}" method="POST"
                                action="/user/{{ $user->username }}/delete">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="d-flex justify-content-center">{{ $users->links() }}</div>

    </div>

</x-app-layout>
