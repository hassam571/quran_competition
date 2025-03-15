@extends('admin.layout.app')

@section('content')
    <div class="container">
        <h2>Create User</h2>
        <div class="card my-4">
            <div class="card-header">
                Create User
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="user_name" class="form-label">User Name</label>
                            <input type="text" class="form-control" name="user_name" id="user_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="user_role" class="form-label">User Role</label>
                            <input type="text" class="form-control" name="user_role" id="user_role" required value="user" readonly >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
