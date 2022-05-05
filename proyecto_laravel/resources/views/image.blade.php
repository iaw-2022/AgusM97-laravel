<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Image Profile') }}
        </h2>
    </x-slot>

    <x-delete-confirm-modal type="image" />

    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="img-fluid img-thumbnail mx-auto d-block" src="data:image/gif;base64,{{ $image->file }}"
                        alt="Image #{{ $image->id }}">
                </div>
            </div>
            <div class="col-md-4 border-right">
                <div class="p-3 py-5">
                    <form method="POST" action="{{ route('image_update', ['id' => $image->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Image Info</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mt-3">
                                <label class="labels">Description</label>
                                <textarea name="description" rows="6" type="text" class="form-control"
                                    placeholder="enter description">{{ $image->description }}</textarea>
                            </div>
                        </div>
                        <div class="mt-5 text-end">
                            <button class="btn btn-danger me-3" type="button" data-bs-toggle="modal"
                                data-bs-target="#deleteUserModal" onclick="confirmDelete({{ $image->id }})">
                                Delete Image
                            </button>
                            <button class="btn btn-primary profile-button" type="submit">Save Changes</button>
                        </div>
                        <div class="mt-5 text-end">
                            <a class="btn btn-secondary" type="button" href="{{ url()->previous() }}">Go back</a>
                        </div>

                    </form>

                    <!-- DELETE IMAGE FORM -->
                    <form id="form{{ $image->id }}" method="POST" action="/image/{{ $image->id }}/delete">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>