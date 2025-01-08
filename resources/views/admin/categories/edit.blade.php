<x-app-layouts title="Edit Kategori">
    <div class="card">
        <div class="card-header">
            <h4>Form Edit Kategori</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama Kategori</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                    @error('name') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Kategori</button>
            </form>
        </div>
    </div>
</x-app-layouts>
