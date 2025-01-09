<x-app-layouts title="Edit Barang Keluar">
    <div class="card">
        <div class="card-header">
            <h4>Edit Barang Keluar</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('staff.barangKeluar.update', $barangKeluar->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="barang_id">Barang</label>
                    <select class="form-control @error('barang_id') is-invalid @enderror" id="barang_id" name="barang_id" required>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}" @if($barang->id == $barangKeluar->barang_id) selected @endif>{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                    @error('barang_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="jumlah_keluar">Jumlah Keluar</label>
                    <input type="number" class="form-control @error('jumlah_keluar') is-invalid @enderror" id="jumlah_keluar" name="jumlah_keluar" value="{{ old('jumlah_keluar', $barangKeluar->jumlah_keluar) }}" required>
                    @error('jumlah_keluar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="tanggal_keluar">Tanggal Keluar</label>
                    <input type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror" id="tanggal_keluar" name="tanggal_keluar" value="{{ old('tanggal_keluar', $barangKeluar->tanggal_keluar) }}" required>
                    @error('tanggal_keluar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $barangKeluar->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</x-app-layouts>