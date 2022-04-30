<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Users') }}
        </h2>
    </x-slot>

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
                                <button type="button" class="btn btn-secondary"><i
                                        class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="d-flex justify-content-center">{{ $users->links() }}</div>

    </div>

</x-app-layout>
