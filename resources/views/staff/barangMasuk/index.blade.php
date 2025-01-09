<x-app-layouts title="Daftar Barang Masuk">
    <x-search action="{{ route('staff.barangMasuk.index') }}" />
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Barang Masuk</h4>
            <a href="{{ route('staff.barangMasuk.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Barang Masuk
            </a>
        </div>
        <div class="card-body">
            <x-alert />
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Masuk</th>
                        <th>Tanggal Masuk</th>
                        <th>Keterangan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangMasuks as $barangMasuk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barangMasuk->barang->nama_barang }}</td>
                            <td>{{ $barangMasuk->jumlah_masuk }}</td>
                            <td>{{ $barangMasuk->tanggal_masuk }}</td>
                            <td>{{ $barangMasuk->keterangan }}</td>
                            <td>
                                <a href="{{ route('staff.barangMasuk.edit', $barangMasuk->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('staff.barangMasuk.destroy', $barangMasuk->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus barang masuk ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
