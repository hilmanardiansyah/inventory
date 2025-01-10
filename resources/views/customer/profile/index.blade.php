<x-app-layouts>
    <x-slot name="title">Profil Pengguna</x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Profil Pengguna</h2>
                <div class="card">
                    <div class="card-body">
                        <p><strong>Nama:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}</p>
                        <p><strong>Address:</strong> {{ $user->address ?? 'Not provided' }}</p>

                        <a href="{{ route('customer.profile.edit') }}" class="btn btn-primary">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>
