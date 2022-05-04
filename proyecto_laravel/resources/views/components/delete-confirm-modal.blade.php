@props(['type'])

<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="DeleteUserModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirm delete</h5>
            </div>
            <div class="modal-body">
                @switch($type)
                    @case('user')
                        Are you sure you want to delete this user and all of it's related content?
                    @break

                    @case('image')
                        Are you sure you want to delete this image?
                    @break

                    @default
                        null
                @endswitch
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="submitDelete()">Delete</button>
            </div>
        </div>
    </div>
</div>
