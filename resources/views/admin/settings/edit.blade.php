<x-app-layouts title="Edit Setting">
    <div class="card">
        <div class="card-header">
            <h4>Edit Setting</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.update', $setting) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $setting->name) }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="value">Value</label>
                    <input type="text" id="value" name="value" class="form-control" value="{{ old('value', $setting->value) }}" required>
                    @error('value')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Setting</button>
            </form>
        </div>
    </div>
</x-app-layouts>
