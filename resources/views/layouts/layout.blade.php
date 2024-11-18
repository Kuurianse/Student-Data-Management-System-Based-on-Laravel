<!-- resources/views/layouts/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">Home</a>
            @auth
                <li class="nav-item">
                    <span class="navbar-text text-light">Halo, {{ Auth::user()->name }}</span>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                </li>
            @endauth
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('create') }}">Tambah Data</a>
                    </li>
                    <form action="{{ route('search') }}" method="GET" class="d-flex ms-3">
                        <input type="text" name="keyword" class="form-control me-2" placeholder="Cari Mahasiswa..." value="{{ request('keyword') }}">
                        <button type="submit" class="btn btn-light ">Search</button>
                    </form>                   
                @endauth
                @guest
                    <li class="nav-item ms-3">
                        <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    {{-- success msg --}}
    @if (session('success'))
        <div class="container mt-3">
            <div class="alert alert-success text-center mx-auto" style="max-width: 600px;">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Content -->
    <div class="container mt-5 text-center">
        @yield('content')
    </div>

    {{-- error msg --}}
    @if ($errors->any())
        <div class="container mt-3">
            <div class="alert alert-danger mx-auto" style="max-width: 400px;">
                <ul class="text-center mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>        
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <script src="/js/bootstrap.bundle.min.js"></script>

</body>
</html>
