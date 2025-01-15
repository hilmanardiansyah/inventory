<x-app-layouts title="Settings">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Settings</h4>
            <a href="{{ route('admin.settings.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Add New Setting
            </a>
        </div>
        <div class="card-body">
            <x-alert />
            <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $index => $setting)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $setting->name }}</td>
                            <td>{{ $setting->value }}</td>
                            <td>
                                <a href="{{ route('admin.settings.edit', $setting) }}" class="btn btn-icon icon-left btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.settings.destroy', $setting) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-icon icon-left btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this setting?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</x-app-layouts>
