<x-app-layouts title="Buat Kategori">
    <div class="card">
        <div class="card-header">
            <h4>Form Buat Kategori</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Kategori</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan Kategori</button>
            </form>
        </div>
    </div>
</x-app-layouts>
