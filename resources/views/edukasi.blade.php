<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Wisata Edukasi - Pariwisataku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<!-- Navbar -->
<nav class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-600">Pariwisataku</h1>
    <ul class="flex items-center space-x-4">
        <li><a href="/" class="text-gray-700 hover:text-blue-600">Home</a></li>
        
        <!-- Dropdown -->
        <li class="relative">
            <button id="dropdownToggle" class="text-gray-700 hover:text-blue-600 focus:outline-none">Wisata</button>
            <ul id="dropdownMenu" class="absolute hidden bg-white text-black mt-2 rounded-md shadow-md w-48 z-10">
                <li><a href="/wisataalam" class="block px-4 py-2 hover:bg-gray-100">Wisata Alam</a></li>
                <li><a href="/wisataedukasi" class="block px-4 py-2 hover:bg-gray-100">Wisata Edukasi</a></li>
                <li><a href="/kuliner" class="block px-4 py-2 hover:bg-gray-100">Wisata Kuliner</a></li>
                <li><a href="/oleh" class="block px-4 py-2 hover:bg-gray-100">Oleh-Oleh</a></li>
            </ul>
        </li>
        <li><a href="/budaya" class="text-gray-700 hover:text-blue-600">Budaya</a></li>
        <li><a href="/staycation" class="text-gray-700 hover:text-blue-600">Staycation</a></li>
        <li><a href="/login" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</a></li>
    </ul>
</nav>

<!-- Header -->
<div class="text-center my-10">
    <h2 class="text-3xl font-bold text-blue-700">Wisata Edukasi di Jember</h2>
    <p class="text-gray-600 mt-2 max-w-xl mx-auto">Temukan destinasi wisata edukatif yang seru, informatif, dan cocok untuk semua usia – dari pertanian hingga teknologi!</p>
</div>

<!-- Grid Edukasi -->
<div class="grid md:grid-cols-2 gap-8 px-6 pb-12">
    @foreach ($edukasi as $index => $item)
    <div class="bg-white shadow-md rounded-xl overflow-hidden hover:shadow-lg transition duration-300">
        <img src="{{ $item->gambar }}" alt="{{ $item->nama }}" class="w-full h-64 object-cover">
        <div class="p-5">
            <h3 class="text-2xl font-semibold text-blue-800 mb-1">📘 {{ $item->nama }}</h3>
            <p class="text-gray-700 mb-2">{{ Str::limit($item->deskripsi, 120) }}</p>
            @if($item->jadwal)
                <p class="text-sm text-gray-600">🕒 Jadwal: {{ $item->jadwal }}</p>
            @endif
            @if($item->tiket)
                <p class="text-sm text-gray-600 mt-1">🎟️ Tiket: {{ $item->tiket }}</p>
            @endif
            <a href="{{ route('edukasi.show', $item->id) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lihat Detail</a>
        </div>
    </div>
    @endforeach
</div>

<!-- Script Dropdown -->
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
</body>
</html>
