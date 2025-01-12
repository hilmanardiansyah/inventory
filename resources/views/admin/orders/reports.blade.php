<x-app-layouts title="Laporan Pesanan">
    <x-search action="{{ route('admin.orders.reports') }}" />
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Laporan Pesanan</h4>
            <a href="{{ route('admin.orders.export') }}" class="btn btn-success btn-sm">
                <i class="fas fa-file-export"></i> Export Laporan
            </a>

        </div>
        <div class="card-body">
            <x-alert />
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nomor Pesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Pesanan</th>
                        <th>Status</th>
                        <th>Total Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer->name ?? '-' }}</td>
                            <td>{{ $order->created_at->format('d-m-Y') }}</td>
                            <td>
                                <span class="badge badge-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-icon icon-left btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-secondary">Tidak ada laporan pesanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layouts>
