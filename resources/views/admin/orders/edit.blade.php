<x-app-layouts title="Edit Order">
    <div class="card">
        <div class="card-header">
            <h4>Edit Order</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="customer_id">Customer</label>
                    <select id="customer_id" name="customer_id" class="form-control">
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" @if($customer->id == $order->customer_id) selected @endif>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" id="status" name="status" class="form-control" value="{{ old('status', $order->status) }}" required>
                    @error('status') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="total_amount">Total Amount</label>
                    <input type="text" id="total_amount" name="total_amount" class="form-control" value="{{ old('total_amount', $order->total_amount) }}" required>
                    @error('total_amount') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                    </div>
                    <h4>Items</h4>
                    <div id="items">
                        @foreach ($order->orderDetails as $index => $item)
                            <div class="item">
                                <div class="form-group">
                                    <label for="product_id">Product</label>
                                    <select name="items[{{ $index }}][product_id]" class="form-control" required>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" {{ $product->id == $item->product_id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="items[{{ $index }}][quantity]" class="form-control" value="{{ $item->quantity }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="items[{{ $index }}][price]" class="form-control" value="{{ $item->price }}" required>
                                </div>
                            </div>
                        @endforeach
                    </div>
                <button type="submit" class="btn btn-primary">Update Order</button>
            </form>
        </div>
    </div>
</x-app-layouts>
