@extends('admin.layout.app')

@section('content')
<div class="container-fluid">
    <h2 class="text-center my-4">User List</h2>
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <span>User Management</span>
                <a href="{{ route('users.create') }}" class="btn btn-light btn-sm">+ Add New User</a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover align-middle text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->user_role }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge {{ $user->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($user->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('users.edit', $user->user_id) }}" class="btn btn-warning btn-sm mx-1">Edit</a>
                                <form action="{{ route('users.destroy', $user->user_id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                <form action="{{ route('users.toggle-status', $user->user_id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm mx-1 {{ $user->status === 'active' ? 'btn-secondary' : 'btn-success' }}">
                                        {{ $user->status === 'active' ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
            <p class="text-muted">Total Users: {{ $users->count() }}</p>
        </div>
    </div>
</div>
@endsection
