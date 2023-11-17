<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Your custom styles -->
    <style>
        /* Custom styles can be added here */
        body {
            padding-top: 5rem;
        }
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0; /* Initially show the sidebar */
            width: 200px; /* Adjust the width of the sidebar */
            background-color: #212529;
            transition: all 0.3s;
            z-index: 1000;
            overflow-y: auto;
            padding-top: 56px;
            color: #fff;
        }
        .sidebar.hide {
            left: -200px; /* Hide the sidebar when 'hide' class is applied */
        }
        .sidebar-header {
            padding: 12px;
            background-color: #343a40;
            text-align: center;
            font-size: 1.0rem;
            margin-bottom: 20px;
        }
        .sidebar ul.navbar-nav {
            padding-left: 0;
        }
        .sidebar ul.navbar-nav li.nav-item {
            width: 100%;
        }
        .sidebar ul.navbar-nav li.nav-item a.nav-link {
            padding: 10px 15px;
            color: #fff;
            transition: 0.3s;
            border-left: 3px solid transparent;
        }
        .sidebar ul.navbar-nav li.nav-item a.nav-link:hover {
            background-color: #343a40;
            border-left: 3px solid #f8f9fa; /* Change border color on hover */
        }
        .content-area {
            margin-left: 0; /* Adjust the margin to accommodate the sidebar */
            transition: all 0.3s;
            padding-left: 210px; /* Increase padding to avoid content overlap */
        }
        .content-area.sidebar-show {
            margin-left: 200px; /* Shift the content when the sidebar is visible */
        }
    </style>
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Employee Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                @guest <!-- Only show these links if the user is a guest (not logged in) -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else <!-- Show logout button if the user is authenticated -->
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conditional display of sidebar and content -->
    @auth <!-- Show sidebar and content if user is authenticated -->
        <!-- Sidebar toggle button -->
    <button class="btn btn-dark d-lg-none" id="sidebarToggle">Toggle Sidebar</button>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        Employee Management System
    </div>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('employees.index') }}">Employees</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('departments.index') }}">Departments</a>
        </li>
        <!-- Add more sidebar links as needed -->
    </ul>
</div>

<!-- Main content area -->
<div class="content-area">
    @yield('content')
</div>
    @else <!-- Show only the content if the user is a guest (not logged in) -->
        <div class="container mt-4">
            @yield('content')
        </div>
    @endauth

    <!-- Bootstrap JS (optional for certain components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript to toggle the sidebar visibility
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('show');
            document.querySelector('.content-area').classList.toggle('sidebar-show');
        });
    </script>
</body>
</html>
