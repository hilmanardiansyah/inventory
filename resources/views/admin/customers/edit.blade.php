<x-app-layouts title="Edit Customer">
    <div class="card">
        <div class="card-header">
            <h4>Edit Customer</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" @if($user->id == $customer->user_id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Customer</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $customer->name) }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $customer->phone) }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control">{{ old('address', $customer->address) }}</textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layouts>
