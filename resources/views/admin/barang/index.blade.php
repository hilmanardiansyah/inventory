<x-app-layouts title="Daftar Produk">
    <x-search action="{{ route('admin.barang.index') }}" />
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Produk</h4>
            <a href="{{ route('admin.barang.create') }}" class="btn btn-success btn-sm">
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
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangs as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->category->name ?? 'Tidak Ada Kategori' }}</td> <!-- Nama kategori -->
                            <td>{{ $barang->stok }}</td>
                            <td>{{ $barang->harga }}</td>
                            <td>
                                <a href="{{ route('admin.barang.edit', $barang->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.barang.destroy', $barang->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">
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
    </div>
</x-app-layout>
