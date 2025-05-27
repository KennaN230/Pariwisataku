<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Wisata Alam - Pariwisataku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 font-sans">
<form method="POST" action="/logout">
  @csrf
</form>
    <!-- Navbar -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-600">Pariwisataku</h1>
    <ul class="flex items-center space-x-4">
        <li>
            <a href="/dashboard" class="{{ Request::is('/dashboard') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-600' }}">Home</a>
        </li>

        <!-- Dropdown -->
        <li class="relative">
            <button id="dropdownToggle" class="flex items-center gap-1 {{ Request::is('alam') || Request::is('edukasi') || Request::is('kuliner') || Request::is('oleh') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-600' }}">
                Wisata
                
            </button>
            <ul id="dropdownMenu" class="absolute hidden bg-white text-black mt-2 rounded-md shadow-md w-48 z-10">
                <li><a href="/alam" class="block px-4 py-2 hover:bg-gray-100 {{ Request::is('alam') ? 'text-blue-600 font-semibold' : 'text-gray-700 hover:text-blue-600' }}">Wisata Alam</a></li>
                <li><a href="/edukasi" class="block px-4 py-2 hover:bg-gray-100 {{ Request::is('edukasi') ? 'text-blue-600 font-semibold' : '' }}">Wisata Edukasi</a></li>
                <li><a href="/kuliner" class="block px-4 py-2 hover:bg-gray-100 {{ Request::is('kuliner') ? 'text-blue-600 font-semibold' : '' }}">Wisata Kuliner</a></li>
                <li><a href="/oleh" class="block px-4 py-2 hover:bg-gray-100 {{ Request::is('oleh') ? 'text-blue-600 font-semibold' : '' }}">Oleh-Oleh</a></li>
            </ul>
        </li>

        <li>
            <a href="/budaya" class="{{ Request::is('budaya') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-600' }}">Budaya</a>
        </li>
        <li>
            <a href="/staycation" class="{{ Request::is('staycation') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-600' }}">Staycation</a>
        </li>
        @if(Auth::check())
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="btn btn-primary">Login</a></li>
                @endif
    </ul>
</nav>


    <!-- Judul -->
    <div class="text-center my-10">
        <h2 class="text-4xl font-bold text-blue-800">Jelajahi Keindahan Wisata Alam Jember</h2>
        <p class="mt-2 text-gray-600">Temukan pesona alam tersembunyi yang menyejukkan mata dan jiwa.</p>
    </div>

    <!-- Grid Card -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-6 pb-12">
    @foreach ($alam as $item)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition-transform">
        <img src="{{ $item->gambar }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <!-- Nama dan rating sejajar -->
                <div class="flex items-center space-x-2 mb-1">
                    <h3 class="text-lg font-semibold text-blue-800">{{ $item->nama }}</h3>
                    <span class="text-sm text-yellow-500">★ {{ number_format($item->rating, 1) }}</span>
                </div>

                <!-- Lokasi -->
                <p class="text-sm text-gray-600 mb-2">{{ $item->lokasi }}</p>

                <!-- Deskripsi -->
                <p class="text-sm text-gray-700 mb-4">
                    {{ Str::limit($item->deskripsi, 100) }}
                </p>

                <!-- Tombol -->
                <button 
                    onclick="showDetail({{ json_encode($item) }})" 
                    class="mt-3 inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300"
                >
                    Lihat Detail
                </button>
            </div>
        </div>
    @endforeach
</div>

<!-- Modal Detail -->
    <div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white p-4 border-b flex justify-between items-center">
                <h3 class="text-xl font-bold text-blue-800" id="modalTitle"></h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                    ✕
                </button>
            </div>
            
            <div class="p-6">
                <img id="modalImage" src="" alt="" class="w-full h-64 object-cover rounded-lg mb-4">
                
                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <h4 class="font-semibold text-blue-700">📍 Lokasi</h4>
                        <p id="modalLokasi" class="text-gray-700"></p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-blue-700">🕒 Jadwal</h4>
                        <p id="modalJadwal" class="text-gray-700"></p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-blue-700">🎟️ Tiket</h4>
                        <p id="modalTiket" class="text-gray-700"></p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-blue-700">📞 Kontak</h4>
                        <p id="modalKontak" class="text-gray-700"></p>
                    </div>
                </div>
                
                <div class="mb-6">
                    <h4 class="font-semibold text-blue-700">📝 Deskripsi</h4>
                    <p id="modalDeskripsi" class="text-gray-700"></p>
                </div>
                
                <div id="modalFasilitasContainer" class="hidden">
                    <h4 class="font-semibold text-blue-700">🏫 Fasilitas</h4>
                    <div id="modalFasilitas" class="grid grid-cols-2 gap-2 mt-2"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan modal detail
        function showDetail(item) {
            document.getElementById('modalTitle').textContent = item.nama;
            document.getElementById('modalImage').src = item.gambar;
            document.getElementById('modalImage').alt = item.nama;
            document.getElementById('modalLokasi').textContent = item.lokasi || '-';
            document.getElementById('modalJadwal').textContent = item.jadwal || '-';
            document.getElementById('modalTiket').textContent = item.tiket || '-';
            document.getElementById('modalKontak').textContent = item.kontak || '-';
            document.getElementById('modalDeskripsi').textContent = item.deskripsi;
            
            // Handle fasilitas
            const fasilitasContainer = document.getElementById('modalFasilitasContainer');
            const fasilitasElement = document.getElementById('modalFasilitas');
            
            if (item.fasilitas) {
                fasilitasElement.innerHTML = '';
                item.fasilitas.split(',').forEach(fasilitas => {
                    if (fasilitas.trim()) {
                        const div = document.createElement('div');
                        div.className = 'bg-blue-100 px-3 py-1 rounded flex items-center';
                        div.innerHTML = `<span class="mr-2">✓</span><span>${fasilitas.trim()}</span>`;
                        fasilitasElement.appendChild(div);
                    }
                });
                fasilitasContainer.classList.remove('hidden');
            } else {
                fasilitasContainer.classList.add('hidden');
            }
            
            // Tampilkan modal
            document.getElementById('detailModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById('detailModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // Tutup modal ketika klik di luar konten
        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>

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
