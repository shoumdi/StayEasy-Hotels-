<?php


$timeNow = explode(' ',now())[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Custom Styles for Hero Section */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .booking-form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-top: -50px;
            /* Overlap effect */
        }

        .hotel-card img {
            height: 200px;
            object-fit: cover;
        }

        .hotel-card {
            transition: transform 0.2s;
        }

        .hotel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fa-solid fa-hotel me-2"></i>LuxeStay
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Hotels</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item ms-lg-3">
                        <a href="{{route('auth.login.view')}}" class="btn btn-outline-light btn-sm">Login</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{route('auth.register.view')}}" class="btn btn-primary btn-sm">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section">
        <div class="text-center">
            <h1 class="display-3 fw-bold">Find Your Next Stay</h1>
            <p class="lead">Discover the best hotels at the best prices</p>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="booking-form-container position-relative">
                    <form action="{{route('reservations.disponible')}}" method="GET" class="row g-3">
                    
                        <div class="col-md-3">
                            <label class="form-label fw-bold text-dark">Check In</label>
                            <input type="date" min="{{$timeNow}}" name="checkIn" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-bold text-dark">Check Out</label>
                            <input type="date" min="{{$timeNow}}" name="checkOut" class="form-control">
                        </div>

                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 mt-4">
        <h2 class="mb-4 fw-bold text-dark border-start border-4 border-primary ps-3">Featured Hotels</h2>
        @isset($hotels)
        <div class="row g-4">
            @foreach($hotels as $hotel)

            <div class="col-md-4">
                <div class="card hotel-card h-100 border-0 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="Hotel 1">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold">{{$hotel->name}}</h5>
                            <span class="badge bg-warning text-dark"><i class="fa-solid fa-star"></i> 4.8</span>
                        </div>
                        <p class="text-muted small mb-3"><i class="fa-solid fa-map-marker-alt text-danger me-1"></i>{{$hotel->address}}</p>
                        <!-- <p class="card-text text-secondary">Experience luxury in the heart of the city with ocean views and premium service.</p> -->

                        <!-- <div class="d-flex justify-content-between align-items-center mt-4">
                            <div>
                                <span class="text-muted small">Start from</span><br>
                                <span class="h5 fw-bold text-primary">$250</span><span class="text-muted">/night</span>
                            </div> -->
                        <form action="" method="GET">
                            <input type="hidden" name="hotel_id" value="1">
                            <button type="submit" class="btn btn-outline-primary">View Rooms</button>
                        </form>
                        <!-- <div class="card hotel-card h-100 border-0 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="Hotel 1">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold">Grand Plaza Hotel</h5>
                            <span class="badge bg-warning text-dark"><i class="fa-solid fa-star"></i> 4.8</span>
                        </div>
                        <p class="text-muted small mb-3"><i class="fa-solid fa-map-marker-alt text-danger me-1"></i> New York, USA</p>
                        <p class="card-text text-secondary">Experience luxury in the heart of the city with ocean views and premium service.</p>
                        
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div>
                                <span class="text-muted small">Start from</span><br>
                                <span class="h5 fw-bold text-primary">$250</span><span class="text-muted">/night</span>
                            </div>
                             -->

                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endisset
    </div>
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    </div>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; 2023 LuxeStay Hotels. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>