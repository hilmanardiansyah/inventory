<x-app-layouts title="Daftar Produk ">
    <x-search action="{{ route('staff.barang.index') }}" />
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftaf Produk</h4>
            <a href="{{ route('staff.barang.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>
        <div class="card-body">
            <x-alert />
            <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->category->name ?? 'Tidak Ada Kategori' }}</td> <!-- Nama kategori -->
                            <td>{{ $barang->stok }}</td>
                            <td>{{ number_format($barang->harga, 2) }}</td>
                            <td>
                                <a href="{{ route('staff.barang.edit', $barang) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('staff.barang.destroy', $barang) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</x-app-layouts>
