<?php
$links = [
    [
        'title' => 'Users',
        'selected' => true,
        "icon" => 'fa-solid fa-user-large me-3'

    ],
    [
        'title' => 'Role',
        'selected' => false,
        "icon" => 'fa-solid fa-key me-3'

    ],
    [
        'title' => 'Hotel',
        'selected' => false,
        "icon" => 'fa-solid fa-bed me-3'
    ]
]
?>
@extends('layouts.app')
@section('content')
<aside class="sidebar" id="sidebar">
    <div class="brand-logo">
        <div class="bg-primary text-white p-2 rounded-3">
            <i class="fa-solid fa-hotel"></i>
        </div>
        <span>EasyStay</span>
    </div>

    <ul class="nav nav-pills flex-column">
        @foreach($links as $link)
        <li class="nav-item">
            <a href="#" class="nav-link {{($link['selected'])? 'active' : ''}}"><i class="{{$link['icon']}}"></i>{{$link['title']}}</a>
        </li>
        @endforeach
    </ul>
</aside>

<div class="main-wrapper">
    <header class="d-flex justify-content-between align-items-center mb-5">
        <div class="search-container d-none d-md-block">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="form-control search-input w-100" placeholder="Search rooms...">
        </div>

        <div class="d-flex align-items-center gap-3">
            <div class="text-end">
                <h6 class="mb-0 fw-bold">Alex Johnson</h6>
                <span class="text-muted small">Property Manager</span>
            </div>
            <div class="dropdown">
                <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80" class="rounded-circle border" width="45" height="45" style="cursor: pointer;" data-bs-toggle="dropdown">
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2 mt-2">
                    <li><a class="dropdown-item rounded" href="#">Profile</a></li>
                    <li><a class="dropdown-item rounded text-danger" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        @yield('main');
    </main>
</div>
@endsection
@push('additionalStyle')
<style>
    :root {
        --brand-primary: #6366f1;
        /* Modern Indigo */
        --sidebar-bg: #ffffff;
        --main-bg: #f8fafc;
        --text-dark: #1e293b;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: var(--main-bg);
        color: var(--text-dark);
    }

    .sidebar {
        width: 260px;
        height: 100vh;
        position: fixed;
        background: var(--sidebar-bg);
        border-right: 1px solid #e2e8f0;
        padding: 1.5rem;
        z-index: 100;
    }

    .brand-logo {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--brand-primary);
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .nav-pills .nav-link {
        color: #64748b;
        font-weight: 500;
        margin-bottom: 0.5rem;
        border-radius: 10px;
        padding: 0.8rem 1rem;
        transition: 0.3s;
    }

    .nav-pills .nav-link:hover {
        background: #f1f5f9;
        color: var(--brand-primary);
    }

    .nav-pills .nav-link.active {
        background: #eef2ff;
        color: var(--brand-primary);
    }

    /* Main Content */
    .main-wrapper {
        margin-left: 260px;
        padding: 2rem;
    }

    /* Modern Card Design */
    .custom-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .search-input {
        background: #f1f5f9;
        border: none;
        border-radius: 10px;
        padding: 0.6rem 1rem 0.6rem 2.5rem;
    }

    .search-container {
        position: relative;
    }

    .search-container i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
    }

    /* Table Aesthetics */
    .table thead th {
        background: #f8fafc;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #64748b;
        padding: 1rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .room-img {
        width: 45px;
        height: 45px;
        object-fit: cover;
        border-radius: 12px;
    }

    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 6px;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .sidebar {
            transform: translateX(-100%);
            transition: 0.3s;
        }

        .main-wrapper {
            margin-left: 0;
        }

        .sidebar.active {
            transform: translateX(0);
        }
    }
</style>
@endpush