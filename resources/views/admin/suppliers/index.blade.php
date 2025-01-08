<x-app-layouts title="Tabel Supplier">
    <x-search action="{{ route('admin.suppliers.index') }}" />

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Table Supplier</h4>
            <a href="{{ route('admin.suppliers.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Supplier
            </a>
        </div>
        <div class="card-body">
            <x-alert />
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Supplier</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Produk Terkait</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td>{{ $supplier->address ?? '-' }}</td>
                            <td>{{ $supplier->products->count() }} Produk</td>
                            <td>
                                <a href="{{ route('admin.suppliers.edit', $supplier) }}" class="btn btn-icon icon-left btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.suppliers.destroy', $supplier) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-icon icon-left btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus supplier ini?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layouts>
