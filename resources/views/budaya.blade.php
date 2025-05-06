<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Budaya Jember - Pariwisataku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-600">Pariwisataku</h1>
        <ul class="flex items-center space-x-4">
            <li><a href="#" class="text-gray-700 hover:text-blue-600">Home</a></li>
             <!-- Dropdown (pakai klik, bukan hover) -->
<li class="relative">
    <button id="dropdownToggle" class="text-gray-700 hover:text-blue-600 focus:outline-none">Wisata</button>
    <ul id="dropdownMenu" class="absolute hidden bg-white text-black mt-2 rounded-md shadow-md w-48 z-10">
        <li><a href="/alam" class="block px-4 py-2 hover:bg-gray-100">Wisata Alam</a></li>
        <li><a href="/edukasi" class="block px-4 py-2 hover:bg-gray-100">Wisata Edukasi</a></li>
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
    <div class="text-center my-8">
        <h2 class="text-3xl font-bold text-blue-800">Budaya Khas Jember</h2>
        <p class="text-gray-600 mt-2">Kenali budaya lokal Jember yang unik dan penuh warna.</p>
    </div>

    <!-- Konten Budaya -->
    @foreach ($budaya as $index => $item)
    <div class="grid md:grid-cols-2 gap-6 items-center bg-white shadow rounded-xl p-6 mb-8
        {{ $index % 2 === 1 ? 'md:flex-row-reverse' : '' }}">
        
        {{-- Gambar --}}
        <div class="{{ $index % 2 === 1 ? 'md:order-2' : 'md:order-1' }}">
            <img src="{{ $item->gambar }}" alt="{{ $item->nama }}"
                class="w-full h-64 object-cover rounded">
        </div>

        {{-- Konten --}}
        <div class="{{ $index % 2 === 1 ? 'md:order-1' : 'md:order-2' }}">
            <h3 class="text-2xl font-bold text-blue-700 mb-2">{{ $item->nama }}</h3>
            <p class="text-gray-700 mb-2">{{ $item->deskripsi }}</p>
            @if($item->jadwal)
                <p class="text-sm text-gray-600">📅 Jadwal: {{ $item->jadwal }}</p>
            @endif
            @if($item->tiket)
                <p class="text-sm text-gray-600 mt-2">🎟️ Tiket: {{ $item->tiket }}</p>
            @endif
        </div>
    </div>
@endforeach

<script>
    const toggle = document.getElementById('dropdownToggle');
    const menu = document.getElementById('dropdownMenu');

    toggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    // Opsional: klik di luar untuk tutup menu
    document.addEventListener('click', (e) => {
        if (!toggle.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>
</body>
</html>
