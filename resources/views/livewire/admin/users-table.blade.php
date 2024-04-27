<div>
    <!-- Session Messages -->
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Add User Button -->
    <button wire:click="create" class="btn btn-primary">+ Add User</button>

    <!-- Users Table -->
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Action</th>
                <th>Name</th>
                <th>Date & Time</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>
                        <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-info">Edit</button>
                        <button wire:click="delete({{ $user->id }})" class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete this user?') || event.stopImmediatePropagation()">Delete</button>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- User Form Modal -->
    <div id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">{{ $user_id ? 'Edit User' : 'Add User' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Fields -->
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" wire:model="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" wire:model="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" wire:model="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                        <button type="submit" class="btn btn-primary">{{ $user_id ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    window.addEventListener('livewire:load', function () {
        // Listen for Livewire events to open/close the modal
        Livewire.on('openModal', () => {
            $('#userModal').modal('show');
        });

        Livewire.on('closeModal', () => {
            $('#userModal').modal('hide');
        });
    });
</script>
@endpush