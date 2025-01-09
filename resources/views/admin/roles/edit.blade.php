<x-app-layouts title="Edit Role">
    <div class="card">
        <div class="card-header">
            <h4>Edit Role</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $role->name) }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="guard_name">Guard Name</label>
                    <select name="guard_name" id="guard_name" class="form-control" required>
                        <option value="web">Web</option>
                        <option value="api">API</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Role</button>
            </form>
        </div>
    </div>
</x-app-layouts>
