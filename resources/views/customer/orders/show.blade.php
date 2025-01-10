<x-app-layouts title="Order Details">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Order Details</h4>
            <a href="{{ route('customer.orders.index') }}" class="btn btn-primary">Back to Orders</a>
        </div>
        <div class="card-body">
            <x-alert />

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $order->status }}</td>
                    </tr>
                    <tr>
                        <th>Total Amount</th>
                        <td>{{ number_format($order->total_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $order->updated_at }}</td>
                    </tr>
                </table>
            </div>

            <!-- Additional Information (Optional) -->
            <div class="mt-4">
                <h5>Order Items</h5>
                <ul>
                    @foreach($order->items as $item)
                        <li>{{ $item->name }} - {{ $item->quantity }} x {{ number_format($item->price, 2) }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layouts>
