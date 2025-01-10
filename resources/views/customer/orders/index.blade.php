<x-app-layouts title="Kategori Produk">
    <x-search action="{{ route('admin.orders.index') }}" />
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar Kategori</h4>
        </div>
        <div class="card-body">
            <x-alert />
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Total Amount</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ number_format($order->total_amount, 2) }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td><a href="{{ route('customer.orders.show', $order->id) }}">View</a></td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layouts>
