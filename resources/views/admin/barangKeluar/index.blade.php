<x-app-layouts title="Daftar Barang Keluar">
    <x-search action="{{ route('admin.barangKeluar.index') }}" />
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Barang Keluar</h4>
            <a href="{{ route('admin.barangKeluar.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Barang Keluar
            </a>
        </div>
        <div class="card-body">
            <x-alert />
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Keluar</th>
                        <th>Tanggal Keluar</th>
                        <th>Keterangan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangKeluars as $barangKeluar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barangKeluar->barang->nama_barang }}</td>
                            <td>{{ $barangKeluar->jumlah_keluar }}</td>
                            <td>{{ $barangKeluar->tanggal_keluar }}</td>
                            <td>{{ $barangKeluar->keterangan }}</td>
                            <td>
                                <a href="{{ route('admin.barangKeluar.edit', $barangKeluar->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.barangKeluar.destroy', $barangKeluar->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus barang keluar ini?')">
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
