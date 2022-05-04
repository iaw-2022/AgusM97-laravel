<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <x-user-delete-confirm />

    @php
        $default = base64_encode(file_get_contents('https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.webp'));
        $picture = is_null($user->picture) ? $default : $user->picture;
    @endphp

    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="data:image/gif;base64,{{ $picture }}">
                    <span class="fw-bolder mt-3 fs-5">{{ $user->username }}</span>
                    <span class="text-black-50">edogaru@mail.com.my</span><span> </span>
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
                                <input name="email" type="text" class="form-control" placeholder="enter email address"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="labels">Bio</label>
                                <textarea name="bio" rows="6" type="text" class="form-control" placeholder="enter bio">{{ $user->bio }}</textarea>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <a class="btn btn-secondary me-5" type="button" href="{{ url()->previous() }}">Go back</a>
                            <button class="btn btn-danger ms-5 me-3" type="button" data-bs-toggle="modal"
                                data-bs-target="#deleteUserModal" onclick="confirmUserDelete({{ $user->id }})">
                                Delete User
                            </button>
                            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                        </div>

                    </form>

                    <!-- DELETE USER FORM -->
                    <form id="form{{ $user->id }}" method="POST" action="/user/{{ $user->username }}/delete">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </div>
            </div>
            <!--
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                            Experience</span><span class="border px-3 p-1 add-experience"><i
                                class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input
                            type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input
                            type="text" class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div>
        -->
        </div>
    </div>
</x-app-layout>
