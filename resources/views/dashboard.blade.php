<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pariwisata Jember</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rochester&family=Roboto+Condensed&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
            background-color: #f9f9f9;
        }
        .navbar-custom {
            background-color: #AAD2E8;
        }
        .navbar-brand, .nav-link {
            font-weight: bold;
            font-size: 18px;
        }
        .hero {
            background-image: url('/foto/back1.jpeg');
            background-size: cover;
            background-position: center;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
        }
        .section-title {
            font-family: 'Rochester', cursive;
            font-size: 48px;
            text-align: center;
            margin-bottom: 50px;
            color: #333;
        }
        .section-subtitle {
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 20px;
            text-align: center;
            margin-bottom: 40px;
            color: #555;
        }
        .card img, .img-fluid {
            border-radius: 10px;
            object-fit: cover;
        }
        .btn-primary, .btn-success {
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: bold;
        }
        .btn-outline-primary {
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: bold;
        }
        .hero h1 {
            font-family: 'Rochester', cursive;
            font-size: 56px;
            margin-bottom: 20px;
        }
        .hero h2 {
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 24px;
        }
        footer {
            background-color: #AAD2E8;
            color: white;
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom py-3">
    <div class="container">
    

<form method="POST" action="/logout">
  @csrf
</form>

        <a class="navbar-brand text-white" href="#">Pariwisata</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar -->
  <nav class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-600">Pariwisataku</h1>
        <ul class="flex items-center space-x-4">
            <li><a href="#" class="text-gray-700 hover:text-blue-600">Home</a></li>
            <li class="relative group">
                <button class="text-gray-700 hover:text-blue-600 focus:outline-none">Wisata</button>
                <ul class="absolute hidden group-hover:block bg-white text-black mt-2 rounded-md shadow-md w-48 z-10">
                    <li><a href="/wisata-alam" class="block px-4 py-2 hover:bg-gray-100">Wisata Alam</a></li>
                    <li><a href="/wisata-edukasi" class="block px-4 py-2 hover:bg-gray-100">Wisata Edukasi</a></li>
                    <li><a href="/wisata-kuliner" class="block px-4 py-2 hover:bg-gray-100">Wisata Kuliner</a></li>
                    <li><a href="/oleh-oleh" class="block px-4 py-2 hover:bg-gray-100">Oleh-Oleh</a></li>
                </ul>
            </li>
            <li><a href="/budaya" class="text-gray-700 hover:text-blue-600">Budaya</a></li>
            <li><a href="/staycation" class="text-gray-700 hover:text-blue-600">Staycation</a></li>
            <li><a href="/login" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</a></li>
        </ul>
    </nav>

        @if(Auth::check())
    <div class="d-flex align-items-center gap-2">
        <span class="text-white fw-bold">Halo, {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
@else
    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
@endif
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <h1>Eksplorasi Jember, Jelajahi Keindahan Tanpa Batas</h1>
    <h2>Cari Destinasi Wisata Jember Dengan Mudah & Cepat dengan AI</h2>
</section>

<!-- Sejarah Jember -->
<section class="container my-5">
    <h2 class="section-title">Sejarah Jember</h2>
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="/foto/back1.jpeg" class="img-fluid" alt="Pemkab Jember">
        </div>
        <div class="col-md-6">
            <p class="section-subtitle">
                Kabupaten Jember terletak di antara Kabupaten Lumajang dan Banyuwangi. 
                Jember dikenal dengan berbagai destinasi wisata alam, budaya, dan kuliner. 
                Selain terkenal dengan Jember Fashion Carnaval (JFC), Jember juga menawarkan 
                kekayaan alam seperti air terjun dan pantai-pantai yang eksotis.
            </p>
        </div>
    </div>
</section>

<!-- Destinasi -->
<section class="container my-5">
    <h2 class="section-title">Destinasi</h2>
    <div class="row text-center g-4">
        <div class="col-md-6">
            <img src="/foto/air terjun.png" class="img-fluid" alt="Wisata Alam">
            <h5 class="mt-3">Wisata Alam</h5>
            <a href="#" class="btn btn-primary mt-2">Lihat Selengkapnya</a>
        </div>
        <div class="col-md-6">
            <img src="/foto/makanan.png" class="img-fluid" alt="Wisata Kuliner">
            <h5 class="mt-3">Wisata Kuliner</h5>
            <a href="#" class="btn btn-primary mt-2">Lihat Selengkapnya</a>
        </div>
    </div>
</section>

<!-- Budaya -->
<section class="container my-5">
    <h2 class="section-title">Budaya</h2>
    <div class="row text-center g-4">
        <div class="col-md-6">
            <img src="/foto/JFC.jpeg" class="img-fluid" alt="JFC">
            <h5 class="mt-3">JFC (Jember Fashion Carnaval)</h5>
            <p class="section-subtitle">Acara tahunan menampilkan busana kreatif dari desainer lokal.</p>
            <a href="#" class="btn btn-primary mt-2">Lihat Selengkapnya</a>
        </div>
        <div class="col-md-6">
            <img src="/foto/Larung Sesaji.jpeg" class="img-fluid" alt="Lautan Budaya">
            <h5 class="mt-3">Lautan Budaya</h5>
            <p class="section-subtitle">Festival budaya lokal yang memperlihatkan kekayaan adat Jember.</p>
            <a href="#" class="btn btn-primary mt-2">Lihat Selengkapnya</a>
        </div>
    </div>
</section>

<!-- Staycation -->
<section class="container my-5">
    <h2 class="section-title">Staycation</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <img src="/foto/hotel1.jpeg" class="card-img-top" alt="Hotel 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Hotel Aston</h5>
                    <a href="#" class="btn btn-success mt-2">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <img src="/foto/hotel2.jpeg" class="card-img-top" alt="Hotel 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Hotel 88</h5>
                    <a href="#" class="btn btn-success mt-2">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <img src="/foto/hotel3.jpeg" class="card-img-top" alt="Hotel 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Hotel Java Lotus</h5>
                    <a href="#" class="btn btn-success mt-2">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center py-3">
    &copy; 2025 Pariwisata Jember
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>