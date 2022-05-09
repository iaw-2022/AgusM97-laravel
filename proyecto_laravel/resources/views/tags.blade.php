<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <x-delete-confirm-modal type="tag" />

    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    <div class="container mb-2">
        <form method="POST" action="{{ route('tag_add') }}">
            {{ csrf_field() }}

            Add new Tag:
            <input name="name" type="text" class="tag-input form-control my-2" placeholder="enter tag name">
            <button class="btn btn-primary profile-button mt-2" type="submit">Save Tag</button>
        </form>
    </div>
    <div class="container border rounded mt-5">
        <div class="row m-2">
            @foreach ($tags as $tag)
                <div class="tag col border py-3 px-2 col-md-auto">
                    <span class="badge rounded-pill bg-primary">{{ $tag->name }}</span>

                    <!-- DELETE BUTTON -->
                    <button type="button" class="btn btn-danger btn-sm option-buttons ms-2" data-bs-toggle="modal"
                        data-bs-target="#deleteUserModal" onclick="confirmDelete({{ $tag->id }})">
                        <i class="bi bi-trash3"></i>
                    </button>

                    <!-- DELETE IMAGE FORM -->
                    <form id="form{{ $tag->id }}" method="POST" action="/tag/{{ $tag->id }}/delete">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">{{ $tags->links() }}</div>
    </div>

</x-app-layout>
