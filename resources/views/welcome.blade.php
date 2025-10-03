<!-- resources/views/layouts/app.blade.php or resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
        }
        .navbar {
            background: linear-gradient(90deg, #007bff, #00c4ff);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
        }
        .nav-link {
            color: #fff !important;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #f8f9fa !important;
        }
        .btn-login {
            background-color: #fff;
            color: #007bff;
            border: 1px solid #007bff;
            padding: 8px 20px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background-color: #007bff;
            color: #fff;
        }
        .hero-section {
            background: url('/images/bus.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            position: relative;
            margin-top: 0;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .btn-book-now {
            background-color: #28a745;
            color: #fff;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 1.1rem;
            text-decoration: none;
        }
        .btn-book-now:hover {
            background-color: #218838;
        }
        .features-section {
            padding: 60px 0;
            background-color: #f4f7fa;
        }
        .feature-card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }
        .feature-card h3 {
            margin-bottom: 15px;
            color: #007bff;
        }
        /* City Highlights Section */
        .city-highlights {
            padding: 60px 0;
            background-color: #fff;
        }
        .city-highlights h2 {
            text-align: center;
            margin-bottom: 40px;
            color: #007bff;
        }
        .city-slider {
            overflow: hidden;
            position: relative;
            width: 100%;
            /* height: 300px;  */
        }
        .city-slider-wrapper {
            display: flex;
            /* width: 300%; */
            width: 3900px;
            height: 100%; 
            object-fit: cover;
            animation: slide 6s infinite; /* 3 images x 2s each */
        }
        .city-slide {
            height: 100%;
            width: 33.33%; /* 100% / 3 images */
            flex-shrink: 0;
        }
        .city-slide img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        @keyframes slide {
            0% { transform: translateX(0); }
            33.33% { transform: translateX(0); }
            33.34% { transform: translateX(-33.33%); }
            66.66% { transform: translateX(-33.33%); }
            66.67% { transform: translateX(-66.66%); }
            100% { transform: translateX(-66.66%); }
        }
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">BusTicket</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class=" btn btn-login ms-3" href="{{ route('loginForm') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Book Your Bus Tickets with Ease</h1>
            <p>Travel comfortably and securely with our reliable bus ticket management system.</p>
            <a href="{{ route('loginForm') }}" class="btn-book-now">Book Now</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="text-center mb-5">Why Choose Us?</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <h3>Easy Booking</h3>
                        <p>Book your tickets in just a few clicks with our user-friendly interface.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <h3>Secure Payments</h3>
                        <p>Enjoy safe and secure payment options for worry-free transactions.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <h3>24/7 Support</h3>
                        <p>Our support team is available round-the-clock to assist you.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- City Highlights Section -->
    <section class="city-highlights">
        <div class="container">
            <h2>Explore Our Destinations</h2>
            <div class="city-slider">
                <div class="city-slider-wrapper">
                    <div class="city-slide">
                        <img src="/images/city1.jpg" alt="City 1">
                    </div>
                    <div class="city-slide">
                        <img src="/images/city2.webp" alt="City 2">
                    </div>
                    <div class="city-slide">
                        <img src="/images/city3.webp" alt="City 3">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© {{ date('Y') }} Bus Ticket Management System. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>