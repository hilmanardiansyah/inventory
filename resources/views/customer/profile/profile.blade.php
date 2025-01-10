<x-app-layouts title="My Profile">
    <div class="card">
        <div class="card-header">
            <h4>My Profile</h4>
        </div>
        <div class="card-body">
            <x-alert />

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $customer->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $customer->email }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $customer->created_at }}</td>
                    </tr>
                </table>
            </div>

            <div class="mt-4">
                <a href="#" class="btn btn-primary">Edit Profile</a>
                <a href="#" class="btn btn-danger">Change Password</a>
            </div>
        </div>
    </div>
</x-app-layouts>
