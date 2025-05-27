<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .navbar .dropdown-toggle::after {
            display: none !important;
        }
        footer {
            background-color: #AAD2E8;
            color: white;
            font-weight: bold;
            font-size: 16px;
        }
        #chat-box {
            transition: all 0.3s ease;
        }
        #chat-messages {
            scroll-behavior: smooth;
        }
        #image-preview img {
            max-height: 100px;
            max-width: 100%;
            border-radius: 5px;
        }
        .spinner-border {
            width: 1.5rem;
            height: 1.5rem;
        }
    </style>
</head>

<body>
    <form method="POST" action="/logout">
        @csrf
    </form>
    
    <!-- Navbar (Fixed Version) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-primary fw-bold" href="/">Pariwisataku</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" 
                    aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Wisata
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/alam">Wisata Alam</a></li>
                            <li><a class="dropdown-item" href="/edukasi">Wisata Edukasi</a></li>
                            <li><a class="dropdown-item" href="/kuliner">Wisata Kuliner</a></li>
                            <li><a class="dropdown-item" href="/oleh">Oleh-Oleh</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/budaya">Budaya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/staycation">Staycation</a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-flex">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Rest of the content remains exactly the same -->
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

    <!-- Destinasi Section -->
<section class="container my-5">
    <h2 class="section-title">Destinasi Wisata</h2>
    <div class="row g-4">
        <!-- Wisata Alam -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <h3 class="card-header bg-primary text-white">Wisata Alam</h3>
                <div class="card-body">
                    @if($alam->count() > 0)
                        @php $alamItem = $alam->first(); @endphp
                        <img src="{{ $alamItem->gambar }}" 
                             class="img-fluid mb-3" 
                             alt="{{ $alamItem->nama }}"
                             style="height: 250px; width: 100%; object-fit: cover; border-radius: 10px;">
                        <h5>{{ $alamItem->nama }}</h5>
                        <p class="section-subtitle">{{ Str::limit($alamItem->deskripsi, 100) }}</p>
                        <a href="#" class="btn btn-outline-primary mt-2">Lihat Selengkapnya</a>
                    @else
                        <div class="alert alert-warning">Belum ada data wisata alam</div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Wisata Kuliner -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <h3 class="card-header bg-success text-white">Wisata Kuliner</h3>
                <div class="card-body">
                    @if($kuliner->count() > 0)
                        @php $kulinerItem = $kuliner->first(); @endphp
                        <img src="{{ $kulinerItem->gambar }}"
                             class="img-fluid mb-3" 
                             alt="{{ $kulinerItem->nama }}"
                             style="height: 250px; width: 100%; object-fit: cover; border-radius: 10px;">
                        <h5>{{ $kulinerItem->nama }}</h5>
                        <p class="text-muted mb-2">
                            <i class="fas fa-map-marker-alt"></i> {{ $kulinerItem->lokasi }}
                        </p>
                        <p class="section-subtitle">{{ Str::limit($kulinerItem->deskripsi, 100) }}</p>
                        <div class="mt-3">
                            <span class="text-primary fw-bold">
                                Rp {{ number_format($kulinerItem->harga, 0, ',', '.') }}
                            </span>
                        </div>
                        <a href="#" class="btn btn-outline-success mt-2">Lihat Selengkapnya</a>
                    @else
                        <div class="alert alert-warning">
                            <i class="fas fa-utensils me-2"></i> Belum ada data wisata kuliner
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- Menampilkan data Budaya -->
    <section class="container my-5">
        <h2 class="section-title">Budaya</h2>
        <div class="row text-center g-4">
            @foreach($budaya as $item)
                <div class="col-md-6">
                <img src="{{ $item->gambar }}" class="img-fluid" alt="{{ $item->nama }}">
                    <h5 class="mt-3">{{ $item->nama }}</h5>
                    <p class="section-subtitle">{{ $item->deskripsi }}</p>
                    <a href="#" class="btn btn-primary mt-2">Lihat Selengkapnya</a>
                </div>
            @endforeach
        </div>
    </section>
-->
@section('content')
<!-- Staycation Section -->
<section class="container my-5">
    <h2 class="section-title">Staycation</h2>
    <div class="row text-center g-4">
        @forelse($penginapan as $penginapan)
        <div class="col-md-6"> <!-- Menggunakan col-md-6 seperti bagian budaya -->
            <div class="card shadow-sm h-100">
                <img src="{{ $penginapan->gambar }}" 
                     class="img-fluid" 
                     alt="{{ $penginapan->nama }}"
                     style="height: 250px; object-fit: cover; border-radius: 10px;">
                
                <div class="card-body">
                    <h5 class="mt-3">{{ $penginapan->nama }}</h5>
                    <p class="section-subtitle">
                        <i class="fas fa-map-marker-alt"></i> {{ $penginapan->lokasi }}<br>
                        {{ Str::limit($penginapan->deskripsi, 100) }}
                    </p>
                    <p class="text-primary fw-bold">
                        Rp {{ number_format($penginapan->harga, 0, ',', '.') }}/malam
                    </p>
                    <a href="/staycation" 
                       class="btn btn-primary mt-2">Lihat Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">Belum ada data penginapan tersedia</div>
        </div>
        @endforelse
    </div>
</section>

    <!-- Tombol Peta Interaktif -->
    <div class="text-center my-4">
        <a href="/peta" class="btn btn-outline-primary btn-lg shadow-sm d-inline-flex align-items-center" style="border-radius: 30px;">
            🗺️ <span class="ms-2">Lihat Peta Interaktif</span>
        </a>
    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        &copy; 2025 Pariwisata Jember
    </footer>

    <!-- Chatbot Toggle Button -->
<div id="chat-toggle" class="position-fixed bottom-0 end-0 m-4">
    <button class="btn btn-primary rounded-circle shadow" style="width: 60px; height: 60px;" onclick="toggleChat()">
        💬
    </button>
</div>

<!-- Chatbot Box -->
<div id="chat-box" class="position-fixed bottom-0 end-0 m-4 p-3 bg-white shadow rounded" style="width: 350px; height: 400px; display: none; z-index: 999;">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <strong>Chat WisataBot</strong>
        <button class="btn-close" aria-label="Close" onclick="toggleChat()"></button>
    </div>
    
    <div id="chat-messages" style="height: 250px; overflow-y: auto; border: 1px solid #ccc; padding: 10px; border-radius: 8px; margin-bottom: 10px;">
        <div><strong>Bot:</strong> Hai! Mau cari wisata apa di Jember?</div>
    </div>
    
    <div class="input-group">
        <input type="text" id="chat-input" class="form-control" placeholder="Tulis pesan..." onkeypress="if(event.key === 'Enter') sendMessage()">
        <button class="btn btn-primary" onclick="sendMessage()">Kirim</button>
    </div>
    
    <div id="loading-indicator" class="text-center mt-2" style="display: none;">
        <div class="spinner-border spinner-border-sm text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <span class="ms-2">Memproses...</span>
    </div>
</div>

<!-- Chatbot and Emergency Toggle Buttons -->
<div class="position-fixed bottom-0 end-0 m-4 d-flex align-items-end" style="gap: 15px;">
    <!-- Emergency Contact Button -->
    <div id="emergency-toggle">
        <button class="btn btn-danger rounded-circle shadow" style="width: 60px; height: 60px;" 
                onclick="toggleEmergency()" title="Kontak Darurat">
            🆘
        </button>
    </div>
    
    <!-- Chatbot Toggle Button -->
    <div id="chat-toggle">
        <button class="btn btn-primary rounded-circle shadow" style="width: 60px; height: 60px;" 
                onclick="toggleChat()" title="Chatbot Wisata">
            💬
        </button>
    </div>
</div>

<!-- Chatbot Box (existing code remains the same) -->
<div id="chat-box" class="position-fixed bottom-0 end-0 m-4 p-3 bg-white shadow rounded" 
     style="width: 350px; height: 400px; display: none; z-index: 999;">
    <!-- ... existing chat box content ... -->
</div>

<!-- Emergency Contact Box -->
<div id="emergency-box" class="position-fixed bottom-0 end-0 m-4 p-3 bg-white shadow rounded" 
     style="width: 300px; display: none; z-index: 999; right: 80px;">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <strong>Kontak Darurat Jember</strong>
        <button class="btn-close" aria-label="Close" onclick="toggleEmergency()"></button>
    </div>
    
    <div class="list-group">
        <a href="tel:112" class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
                <span>Panggilan Darurat Nasional</span>
                <span class="badge bg-danger rounded-pill">112</span>
            </div>
        </a>
        <a href="tel:110" class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
                <span>Polisi</span>
                <span class="badge bg-primary rounded-pill">110</span>
            </div>
        </a>
        <a href="tel:118" class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
                <span>Ambulans</span>
                <span class="badge bg-danger rounded-pill">118</span>
            </div>
        </a>
        <a href="tel:113" class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
                <span>Pemadam Kebakaran</span>
                <span class="badge bg-danger rounded-pill">113</span>
            </div>
        </a>
        <a href="tel:119" class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
                <span>SAR</span>
                <span class="badge bg-warning rounded-pill text-dark">119</span>
            </div>
        </a>
        <a href="tel:+6233174110" class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
                <span>Polres Jember</span>
                <span class="badge bg-primary rounded-pill">(0331) 74110</span>
            </div>
        </a>
        <a href="tel:+62331321110" class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
                <span>RSUD Dr. Soebandi</span>
                <span class="badge bg-danger rounded-pill">(0331) 321110</span>
            </div>
        </a>
    </div>
    
    <div class="mt-2 text-center small text-muted">
        Klik nomor untuk langsung menghubungi
    </div>
</div>

<script>
    // Toggle emergency contact visibility
function toggleEmergency() {
    const emergencyBox = document.getElementById('emergency-box');
    emergencyBox.style.display = emergencyBox.style.display === 'none' ? 'block' : 'none';
    
    // Close chat box if open
    document.getElementById('chat-box').style.display = 'none';
}

// Ganti dengan API key Anda
const GEMINI_API_KEY = 'AIzaSyAhFQ4Ch7QrAzZRAFin3KDx2ZLeOF-aY38';
let chatHistory = [
    {
        role: "model",
        parts: [{ text: "Hai! Mau cari wisata apa di Jember?" }]
    }
];
let isWaiting = false;
let lastRequestTime = 0;
// Toggle chat visibility
function toggleChat() {
    const chatBox = document.getElementById('chat-box');
    chatBox.style.display = chatBox.style.display === 'none' ? 'block' : 'none';
    
    // Close emergency box if open
    document.getElementById('emergency-box').style.display = 'none';
}
async function sendMessage() {
    const input = document.getElementById('chat-input');
    const messages = document.getElementById('chat-messages');
    const loadingIndicator = document.getElementById('loading-indicator');
    const userText = input.value.trim();

    if (!userText || isWaiting) return;

    // Add user message to chat
    messages.innerHTML += `<div><strong>Anda:</strong> ${userText}</div>`;
    input.value = '';
    isWaiting = true;
    loadingIndicator.style.display = 'block';
    messages.scrollTop = messages.scrollHeight;

    try {
        // Rate limiting - minimal 1 detik antara permintaan
        const now = Date.now();
        const timeSinceLastRequest = now - lastRequestTime;
        if (timeSinceLastRequest < 1000) {
            await new Promise(resolve => setTimeout(resolve, 1000 - timeSinceLastRequest));
        }

        chatHistory.push({
            role: "user",
            parts: [{ text: userText }]
        });

        const response = await fetch(`https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=${GEMINI_API_KEY}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                contents: chatHistory,
                generationConfig: {
                    maxOutputTokens: 1000 // Mengurangi output untuk menghemat quota
                }
            })
        });

        lastRequestTime = Date.now();

        if (response.status === 429) {
            throw new Error('Terlalu banyak permintaan. Silakan coba lagi nanti.');
        }

        if (response.status === 403) {
            throw new Error('Kuota API telah habis. Silakan cek billing atau upgrade plan.');
        }

        if (!response.ok) {
            throw new Error(await response.text());
        }

        const data = await response.json();
        const botResponse = data.candidates[0].content.parts[0].text;
        
        messages.innerHTML += `<div><strong>Bot:</strong> ${botResponse}</div>`;
        chatHistory.push({
            role: "model",
            parts: [{ text: botResponse }]
        });
        
    } catch (e) {
        console.error('Error:', e);
        messages.innerHTML += `<div class="text-danger"><strong>Bot:</strong> ${e.message}</div>`;
    } finally {
        isWaiting = false;
        loadingIndicator.style.display = 'none';
        messages.scrollTop = messages.scrollHeight;
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>