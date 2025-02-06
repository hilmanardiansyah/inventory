<x-app-layouts title="Create User">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Pengguna</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No Telepon</label>
                    <input type="phone" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" pattern="\d+" title="Harus berupa angka" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="address" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control">
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                        <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Customer</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</x-app-layouts>
