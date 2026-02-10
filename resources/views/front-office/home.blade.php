<?php
$hotels = [
    [
        'title' => 'Zaki',
    ],
    [
        'title' => 'Mansour',
    ],
    [
        'title' => 'Hdim',
    ],
    [
        'title' => 'Mdina',
    ],
    [
        'title' => '9dima',
    ],
    [
        'title' => 'Marjan',
    ],
    [
        'title' => 'Lhemriya',
    ],

];
?>
@extends('layouts.app')
@section('content')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">StayEasy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hotels</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">My Bookings</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="{{route('auth.login')}}" class="btn btn-tertiary">Login</a>
                    <a href="{{route('auth.register')}}" class="btn btn-primary">Join now</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<main class="">
    <div class="ratio ratio-16x9 relative">
        <img class="img-fluid position-absolute"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3g2_rUUfXJtSMLQH2Jf6uN4oeZrwdOMyhdtaHZv5iEyP5LMJbOZAiBQWUqooO7yWKNIn72ZwWBPLWPWGkd_qT6Bwhl-0VjpbCJWrbwdj7DLfyaCxi89TXubrP5ADNPwcyNGnFUX_1R1EABDXj8985TO4unWKr_mzpo2lGVJPtohSnR0YcpJiuHT0Tq4uqX_UAnNL1r4Ep6LNeplnyPBfh6ghtd_2ou-kfEw_Dnhk4joLvnFBlro1togWnTmEtWSAyJlqK3y20WwgY">
        <div class="d-flex flex-column justify-content-around">
            <span>dkdd</span>
            <h2>Luxury Escapes,<br>seasonal prices.</h2>
        </div>
    </div>
    <section class="mt-3">
        <h4>Flash Deals</h4>
        <p>Limited ....</p>
        <ul class="d-flex flex-nowrap list-unstyled gap-2 overflow-auto ">
            @foreach($hotels as $hotel)
            <li class="flex-shrink-1  flex-grow-0">
                <div class="card" style="width: 14rem;">
                    <img src="{{asset('/assets/images/hotels/hotel.jpg')}}" class="card-img-top rounded-3" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$hotel['title']}}</h5>
                        <p class=""><span>200 Dh</span><span class="mx-1">pour 2 nuits</span><span>4.9</span></p>
                    </div> 
                    <a href="{{route('auth.login')}}" class="position-absolute inset-0 w-100 h-100"></a>
                </div>
            </li>
            @endforeach
        </ul>
    </section>
</main>
@endsection