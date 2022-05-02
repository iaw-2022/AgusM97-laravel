<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <!-- Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="DeleteUserModal"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Confirm delete</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="submitUserDelete()">Delete</button>
                </div>
            </div>
        </div>
    </div>

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

                            <!-- DELETE FROM -->
                            <form id="form{{ $user->id }}" method="POST" action="/user/{{ $user->id }}/delete">
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
