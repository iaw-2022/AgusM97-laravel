<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <x-delete-confirm-modal type="user" />

    @php
        $default = base64_encode(file_get_contents('https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.webp'));
        $picture = is_null($user->picture) ? $default : $user->picture;
    @endphp

    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="data:image/gif;base64,{{ $picture }}"
                        alt="Profile picture">
                    <span class="fw-bolder mt-3 fs-5">{{ $user->username }}</span>
                    <span class="text-black-50">Joined in {{ $user->created_at->format('d/m/Y') }}</span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <form method="POST" action="{{ route('user_update', ['username' => $user->username]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Email Address</label>
                                <input name="email" type="text" class="form-control"
                                    placeholder="enter email address" value="{{ $user->email }}">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="labels">Bio</label>
                                <textarea name="bio" rows="6" type="text" class="form-control" placeholder="enter bio">{{ $user->bio }}</textarea>
                            </div>
                        </div>
                        <div class="mt-5 text-center d-flex justify-content-between">

                            @if (Auth::user()->id != $user->id)
                                <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                    data-bs-target="#deleteUserModal" onclick="confirmDelete({{ $user->id }})">
                                    Delete User
                                </button>
                            @endif

                            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                        </div>

                    </form>
                    @if (Auth::user()->id != $user->id)
                        <form id="form{{ $user->id }}" method="POST"
                            action="/user/{{ $user->username }}/delete">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    @endif

                </div>
            </div>
        </div>

        @if (Auth::user()->id == $user->id)
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 border-right">
                    <h3>Upload a new image</h3>
                    <form method="POST" action="{{ route('image_add', ['username' => $user->username]) }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label class="labels">Select a file</label><br>
                        <input type="file" name="image" accept="image/png, image/jpeg" required><br><br>
                        <label class="labels">Description</label>
                        <textarea name="description" rows="5" type="text" class="form-control" placeholder="enter description"></textarea><br><br>
                        <button class="btn btn-primary profile-button" type="submit">Upload image</button>
                    </form>
                </div>

            </div>
        @endif

        <div class="row d-flex justify-content-center my-3 py-3">

            @if ($user->images->isNotEmpty())
                <h3>Uploaded images</h3>
                <div class="flex-row">
                    @foreach ($user->images as $image)
                        <a href="{{ route('image', ['id' => $image->id]) }}">
                            <img class="mx-3 my-2" height="70px" src="data:image/gif;base64,{{ $image->file }}"
                                alt="{{ $image->id }}">
                        </a>
                    @endforeach
                </div>
            @endif

            @if ($user->galleries->isNotEmpty())
                <h3 class="mt-5">Galleries</h3>
                <div class="col">
                    @foreach ($user->galleries as $gallery)
                        <div class="flex-row">
                            <h4>{{ $gallery->name }}</h3>
                                @foreach ($gallery->images as $image)
                                    <a href="{{ route('image', ['id' => $image->id]) }}">
                                        <img class="mx-3 my-2" height="70px"
                                            src="data:image/gif;base64,{{ $image->file }}"
                                            alt="{{ $image->id }}">
                                    </a>
                                @endforeach
                        </div>
                    @endforeach
                </div>

            @endif

        </div>


    </div>
</x-app-layout>
