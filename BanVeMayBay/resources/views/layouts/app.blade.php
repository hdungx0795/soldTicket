<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Bán Vé Máy Bay</title>

    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Font Awesome cho icon (tùy chọn) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        nav.navbar {
            margin-bottom: 25px;
        }
        .container {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>
    {{-- Thanh menu điều hướng --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">✈️ Bán Vé Máy Bay</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('chuyen-bay.index') }}" class="nav-link">Chuyến bay</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('khach-hang.index') }}" class="nav-link">Khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ve.index') }}" class="nav-link">Vé</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Nội dung chính --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="text-center text-muted mt-4 mb-3">
        <small>© {{ date('Y') }} Hệ thống bán vé máy bay | Laravel Project</small>
    </footer>
</body>
</html>
