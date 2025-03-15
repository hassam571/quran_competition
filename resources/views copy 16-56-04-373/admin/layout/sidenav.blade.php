<div class="sidenav" id="sidenav">
    <h4 class="p-3">Menu</h4>
    <ul>
        <li><a href="{{ route('admin.dashboard') }}" class="text-white">Dashboard</a></li>
        <li><a href="{{ route('users.create') }}" class="text-white">Create User</a></li>
        <li><a href="{{ route('users.index') }}">User List</a></li>
    </ul>
    <form action="{{ route('logout') }}" method="POST" class="p-3 mt-auto">
        @csrf
        <button type="submit" class="btn btn-danger w-100" style="font-weight: bold; font-size: 1rem;">Logout</button>
    </form>
</div>
