<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar .active {
            background-color: #495057;
            border-left: 4px solid #0d6efd;
        }
    </style>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admindashboard') }}">Admin Panel</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <span class="nav-link text-white">Welcome, {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        
                        <form action="{{route('Customer Logout')}}" >
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form> 
                    </li>
                </ul>
            </div>
        </div>
        
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-10">
                <a href="{{ route('admindashboard') }}" class="{{ request()->routeIs('admindashboard') ? 'active' : '' }}">
                    <i class="bi bi-people-fill me-2"></i> Customers
                </a>
                <a href="{{ route('admin.buses.index') }}" class="{{ request()->routeIs('admin.buses.index') ? 'active' : '' }}">
                    <i class="bi bi-bus-front-fill me-2"></i> Bus Mgmt
                </a>
                <a href="{{ route('trips.index') }}" class="{{ request()->routeIs('trips.index') ? 'active' : '' }}">
                    {{-- <i class="bi bi-bus-front-fill me-2"></i> Trips Mgmt --}}
                    <i class="bi bi-airplane-fill me-2"></i> Trips Mgmt
                
                </a>
            </div>

            <!-- Main content -->
            <div class="col-md-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
