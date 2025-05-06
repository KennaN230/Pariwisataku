<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Wisata Kuliner - Pariwisataku</title>
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
            <li><a href="#" class="text-gray-700 hover:text-blue-600">Staycation</a></li>
            <li><a href="/login" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</a></li>
        </ul>
    </nav>

    <!-- Judul -->
    <div class="text-center my-8">
        <h2 class="text-3xl font-bold text-blue-800">Kuliner Jember</h2>
    </div>

    <!-- Grid Card -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-6 pb-12">
    @foreach ($kuliners as $item)
        <div class="bg-white shadow-md rounded-xl overflow-hidden">
            @if (filter_var($item->gambar, FILTER_VALIDATE_URL))
                <!-- Jika gambar adalah URL eksternal -->
                <img src="{{ $item->gambar }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover">
            @else
                <!-- Jika gambar ada di storage lokal -->
                <img src="{{ asset('storage/kuliner/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover">
            @endif
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800">{{ $item->nama }}</h3>
                <p class="text-sm text-gray-500">{{ $item->lokasi }}</p>
                <div class="flex items-center mt-2 text-yellow-400 text-sm">
                    ★ {{ number_format($item->rating, 1) }}
                </div>
                <button class="mt-4 bg-blue-500 text-white w-full py-2 rounded hover:bg-blue-600">Lihat Selengkapnya</button>
            </div>
        </div>
    @endforeach
</div>
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
