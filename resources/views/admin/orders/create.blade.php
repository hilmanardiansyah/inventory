<x-app-layouts title="Create Order">
    <div class="card">
        <div class="card-header">
            <h4>Form Create Order</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.orders.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="customer_id">Customer</label>
                    <select id="customer_id" name="customer_id" class="form-control">
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    @error('customer_id') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" id="status" name="status" class="form-control" value="{{ old('status') }}" required>
                    @error('status') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="total_amount">Total Amount</label>
                    <input type="text" id="total_amount" name="total_amount" class="form-control" value="{{ old('total_amount') }}" required>
                    @error('total_amount') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Save Order</button>
            </form>
        </div>
    </div>
</x-app-layouts>