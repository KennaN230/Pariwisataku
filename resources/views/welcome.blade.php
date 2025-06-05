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
            background-image: url('https://static5.depositphotos.com/1037262/443/i/450/depositphotos_4436189-stock-photo-paradise-beach.jpg');
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
        .navbar .dropdown-toggle::after {
    display: none !important;
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
<nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #ffffff;">
  <div class="container">
    <a class="navbar-brand text-primary fw-bold" href="/">Pariwisataku</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active text-primary fw-semibold' : 'text-dark' }}" href="/">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ Request::is('alam') || Request::is('edukasi') || Request::is('kuliner') || Request::is('oleh') ? 'text-primary fw-semibold' : 'text-dark' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Wisata
          </a>  
          <ul class="dropdown-menu">
            <li><a class="dropdown-item {{ Request::is('alam') ? 'fw-semibold text-primary' : '' }}" href="/alam">Wisata Alam</a></li>
            <li><a class="dropdown-item {{ Request::is('edukasi') ? 'fw-semibold text-primary' : '' }}" href="/edukasi">Wisata Edukasi</a></li>
            <li><a class="dropdown-item {{ Request::is('kuliner') ? 'fw-semibold text-primary' : '' }}" href="/kuliner">Wisata Kuliner</a></li>
            <li><a class="dropdown-item {{ Request::is('oleh') ? 'fw-semibold text-primary' : '' }}" href="/oleh">Oleh-Oleh</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('budaya') ? 'active text-primary fw-semibold' : 'text-dark' }}" href="/budaya">Budaya</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('staycation') ? 'active text-primary fw-semibold' : 'text-dark' }}" href="/staycation">Staycation</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary ms-2" href="/login">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
    const toggle = document.getElementById('dropdownToggle');
    const menu = document.getElementById('dropdownMenu');

    toggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    document.addEventListener('click', (e) => {
        if (!toggle.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>

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
            <img src="https://bangsaonline.com/images/uploads/berita/b36173c743d8b63b616f8f3792b385ee.jpg" class="img-fluid" alt="Pemkab Jember">
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