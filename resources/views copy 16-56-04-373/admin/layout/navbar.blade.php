<nav class="navbar navbar-expand-lg navbar-light" style="background-color: var(--secondary-color);">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: transparent;">&#9776;</span>
        </button>
        <a class="navbar-brand text-white" href="#">Admin Panel</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger nav-link text-white" style="border: none; background-color: transparent; font-weight: bold;">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.querySelector('.navbar-toggler-icon').innerHTML = "&#9776;"; // Add hamburger icon for the toggler
</script>
