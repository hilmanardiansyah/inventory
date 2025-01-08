<x-app-layouts title="Buat Supplier">
    <div class="card">
        <div class="card-header">
            <h4>Form Buat Supplier</h4>
        </div>
        <div class="card-body col-md-8 col-sm">
            <form action="{{ route('admin.suppliers.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Supplier</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Telepon</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
                    @error('phone') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea id="address" name="address" class="form-control">{{ old('address') }}</textarea>
                    @error('address') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan Supplier</button>
            </form>
        </div>
    </div>
</x-app-layouts>
