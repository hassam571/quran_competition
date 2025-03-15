<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('public/assets/css/color.css') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --secondary-color: var(--secondary-color);
            --primary-color: #ffffff;
            --secondary-hover-color: #009e88; /* Replace darken() with a custom darker color */
        }


body{width: 100% !important;}
        .navbar {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            width: 100% !important;
        }

        .sidenav {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            height: 100vh;
            position: fixed;
            width: 20rem;
            top: 0;
            left: 0;
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            z-index: 1050;
        }

        .sidenav.open {
            transform: translateX(0);
        }

        .sidenav ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .sidenav ul li {
            padding: 15px;
        }

        .sidenav ul li a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 1rem;
        }

        .sidenav ul li a:hover {
            text-decoration: underline;
        }

        .sidenav-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1049;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out;
        }

        .sidenav-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 0;
        }

        .content.full-width {
            margin-left: 250px;
        }

        .navbar-toggler {
            color: var(--primary-color);
            border: none;
            font-size: 1.5rem;
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            border: none;
        }

        .btn-secondary:hover {
            background-color: var(--secondary-hover-color);
        }

        @media (min-width: 768px) {
            .sidenav {
                transform: translateX(0);
                width: 250px;
            }

            .content {
                margin-left: 250px;
            }

            .sidenav-overlay {
                display: none;
            }
        }
    </style>
</head>
<body>
@include('admin.layout.navbar')

    {{-- <div class="sidenav-overlay" id="sidenavOverlay"></div> --}}

    {{-- <div class="d-flex"> --}}
        @include('admin.layout.sidenav')


        <div class="content" id="mainContent">
            @yield('content')
        </div>
    {{-- </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidenavToggle = document.getElementById('sidenavToggle');
        const sidenav = document.getElementById('sidenav');
        const sidenavOverlay = document.getElementById('sidenavOverlay');

        sidenavToggle.addEventListener('click', () => {
            sidenav.classList.toggle('open');
            sidenavOverlay.classList.toggle('show');
        });

        sidenavOverlay.addEventListener('click', () => {
            sidenav.classList.remove('open');
            sidenavOverlay.classList.remove('show');
        });
    </script>
</body>
</html>
