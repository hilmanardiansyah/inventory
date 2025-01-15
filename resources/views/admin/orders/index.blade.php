<x-app-layouts title="Kategori Produk">
    <x-search action="{{ route('admin.orders.index') }}" />
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Kategori</h4>
            <a href="{{ route('admin.orders.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Kategori
            </a>
        </div>
        <div class="card-body">
            <x-alert />
            <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Total Amount</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>{{ $order->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
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
</x-app-layouts>
