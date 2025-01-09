<x-app-layouts title="Daftar Barang Keluar">
    <x-search action="{{ route('staff.barangKeluar.index') }}" />
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Barang Keluar</h4>
            <a href="{{ route('staff.barangKeluar.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Barang Masuk
            </a>
        </div>
        <div class="card-body">
            <x-alert />
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Jumlah Keluar</th>
                        <th>Tanggal Keluar</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
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
                                <a href="{{ route('staff.barangKeluar.edit', $barangKeluar->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('staff.barangKeluar.destroy', $barangKeluar->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layouts>
