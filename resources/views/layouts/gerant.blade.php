<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grand Hotel | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        :root {
            --brand-primary: #6366f1; /* Modern Indigo */
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

        .search-container { position: relative; }
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
        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); transition: 0.3s; }
            .main-wrapper { margin-left: 0; }
            .sidebar.active { transform: translateX(0); }
        }
        .selection-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }
        .selection-grid input[type="checkbox"] {
            display: none;
        }
        .selection-grid label {
            display: block;
            padding: 15px 10px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
            background-color: white;
            font-weight: 500;
        }

        .selection-grid input[type="checkbox"]:checked + label {
            border-color: #4f46e5;
            background-color: #f5f3ff;
            color: #4f46e5;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <aside class="sidebar" id="sidebar">
        <div class="brand-logo">
            <div class="bg-primary text-white p-2 rounded-3">
                <i class="fa-solid fa-hotel"></i>
            </div>
            <span>GrandStay</span>
        </div>

        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa-solid fa-house me-3"></i>Overview</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active"><i class="fa-solid fa-bed me-3"></i>Rooms</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa-solid fa-calendar me-3"></i>Bookings</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa-solid fa-chart-line me-3"></i>Reports</a>
            </li>
            <li class="mt-4 ms-3 mb-2 text-muted small text-uppercase">Management</li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa-solid fa-user-group me-3"></i>Staff</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa-solid fa-gear me-3"></i>Settings</a>
            </li>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>