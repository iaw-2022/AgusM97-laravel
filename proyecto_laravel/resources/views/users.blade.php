<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="container">
        <table class="table">
            <thead>
                @foreach ($user_columns as $column)
                    <th scope="col">{{ $column }}</th>
                @endforeach
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        @foreach ($user_columns as $column)
                            <td>{{ $user->$column }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</x-app-layout>
