<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Staycation - Penginapan</title>
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

  <!-- Judul -->
  <div class="text-center my-8">
    <h2 class="text-3xl font-bold text-blue-800">Rekomendasi Penginapan Staycation</h2>
  </div>

  <!-- Grid Card -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-6 pb-12">
    @foreach ($penginapan as $item)
      <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:shadow-xl transition-shadow duration-300">
        <img src="{{ $item->gambar }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-gray-800">{{ $item->nama }}</h3>
          <p class="text-sm text-gray-500">{{ $item->lokasi }}</p>
          <div class="flex items-center mt-2 text-yellow-400 text-sm">★ {{ number_format($item->rating, 1) }}</div>
          <p class="text-sm text-gray-600 mt-2">{{ Str::limit($item->deskripsi, 100) }}</p>
          <div class="flex justify-between items-center mt-2 text-sm text-gray-700">
            <span class="text-blue-600 font-bold">Rp {{ number_format($item->harga, 0) }}/malam</span>
          </div>
          @if($item->fasilitas)
            <div class="mt-2 text-xs text-gray-600">{{ implode(', ', $item->fasilitas) }}</div>
          @endif

          <!-- Tombol aksi -->
          <div class="flex justify-between items-center mt-4 space-x-4">
            <!-- Button untuk membuka Google Maps Street View -->
            @if($item->link_maps) <!-- Cek apakah ada link Google Maps -->
              <button onclick="openStreetView('{{ $item->google_maps_link }}')" 
                class="flex-1 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-center">
                Lihat di Maps
              </button>
            @endif

            <!-- Call Center -->
            <a href="tel:+123456789" class="flex items-center justify-center bg-green-500 text-white w-10 h-10 rounded-full hover:bg-green-600">
              <img src="https://img.icons8.com/ios/50/ffffff/user-male-circle.png" class="w-6 h-6"/>
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <script>
    function openStreetView(url) {
      window.open(url, "_blank", "width=600,height=400"); // Menyesuaikan ukuran popup
    }
  </script>
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
