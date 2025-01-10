<x-app-layouts title="Customer Dashboard">
    <div class="row">
        <!-- Welcome Message -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold">Welcome, {{ auth()->user()->name }}!</h5>
                    <p class="text-muted">Selamat datang di Customer Panel. Kelola pesanan dan informasi akun Anda di sini.</p>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa fa-shopping-cart fa-3x text-primary mb-3"></i>
                    <h6>Total Pesanan</h6>
                    <h5>{{ $totalOrders }}</h5>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa fa-truck fa-3x text-success mb-3"></i>
                    <h6>Pesanan Dalam Pengiriman</h6>
                    <h5>{{ $ordersInProgress }}</h5>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa fa-check-circle fa-3x text-info mb-3"></i>
                    <h6>Pesanan Selesai</h6>
                    <h5>{{ $completedOrders }}</h5>
                </div>
            </div>
        </div>

        <!-- Latest Orders -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Pesanan Terbaru</h6>
                </div>
                <div class="card-body">
                    @if($latestOrders->isEmpty())
                        <p class="text-muted">Tidak ada pesanan terbaru.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latestOrders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                        <td>{{ ucfirst($order->status) }}</td>
                                        <td>Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('customer.orders.show', $order->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>
