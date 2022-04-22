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
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Email verified at</th>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><x-profile-picture :user="$user"/></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->email_verified_at }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</x-app-layout>
