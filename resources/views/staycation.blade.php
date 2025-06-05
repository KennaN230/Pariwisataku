<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staycation - Penginapan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-blue-50 font-sans">
  <!-- Dropdown -->
  <nav class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-600">Pariwisataku</h1>
    <ul class="flex items-center space-x-4 relative">
        <li>
            <a href="/dashboard" class="{{ Request::is('/dashboard') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-600' }}">
                Home
            </a>
        </li>

        <!-- Dropdown Wisata -->
        <li class="relative">
            <button id="dropdownToggle" class="text-gray-700 hover:text-blue-600 focus:outline-none flex items-center">
                Wisata <i class="fas fa-chevron-down ml-1 text-xs"></i>
            </button>
            <ul id="dropdownMenu" class="absolute hidden bg-white text-black mt-2 rounded-md shadow-md w-48 z-10">
                <li>
                    <a href="/alam" class="block px-4 py-2 hover:bg-gray-100 {{ Request::is('alam*') ? 'text-blue-600 font-semibold' : '' }}">
                        Wisata Alam
                    </a>
                </li>
                <li>
                    <a href="/edukasi" class="block px-4 py-2 hover:bg-gray-100 {{ Request::is('edukasi*') ? 'text-blue-600 font-semibold' : '' }}">
                        Wisata Edukasi
                    </a>
                </li>
                <li>
                    <a href="/kuliner" class="block px-4 py-2 hover:bg-gray-100 {{ Request::is('kuliner*') ? 'text-blue-600 font-semibold' : '' }}">
                        Wisata Kuliner
                    </a>
                </li>
                <li>
                    <a href="/oleh" class="block px-4 py-2 hover:bg-gray-100 {{ Request::is('oleh*') ? 'text-blue-600 font-semibold' : '' }}">
                        Oleh-Oleh
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="/budaya" class="{{ Request::is('budaya*') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-600' }}">
                Budaya
            </a>
        </li>
        <li>
            <a href="/staycation" class="{{ Request::is('staycation*') ? 'text-blue-700 font-semibold' : 'text-gray-700 hover:text-blue-600' }}">
                Staycation
            </a>
        </li>
        @if(Auth::check())
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                        Logout
                    </button>
                </form>
            </li>
        @else
            <li>
                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Login
                </a>
            </li>
        @endif
    </ul>
  </nav>

  <!-- Judul -->
  <div class="container mx-auto px-4">
    <div class="text-center my-8">
      <h2 class="text-3xl font-bold text-blue-800">Rekomendasi Penginapan Staycation</h2>
    </div>

    <!-- Grid Card -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 pb-12">
      @foreach ($penginapan as $item)
        <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:shadow-xl transition-shadow duration-300">
          <img src="{{ asset($item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover">
          <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800">{{ $item->nama }}</h3>
            <p class="text-sm text-gray-500">{{ $item->lokasi }}</p>
            <div class="flex items-center mt-2">
              @for ($i = 0; $i < 5; $i++)
                @if ($i < floor($item->rating))
                  <i class="fas fa-star text-yellow-400"></i>
                @elseif ($i < ceil($item->rating) && $item->rating % 1 != 0)
                  <i class="fas fa-star-half-alt text-yellow-400"></i>
                @else
                  <i class="far fa-star text-yellow-400"></i>
                @endif
              @endfor
              <span class="ml-1 text-sm text-gray-600">{{ number_format($item->rating, 1) }}</span>
            </div>
            <p class="text-sm text-gray-600 mt-2">{{ Str::limit($item->deskripsi, 100) }}</p>
            <div class="mt-2 text-blue-600 font-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}/malam</div>
            
            @if($item->fasilitas)
              <div class="mt-2">
                @foreach(array_slice($item->fasilitas, 0, 3) as $fasilitas)
                  <span class="inline-block bg-gray-100 rounded-full px-3 py-1 text-xs font-semibold text-gray-700 mr-1 mb-1">
                    {{ $fasilitas }}
                  </span>
                @endforeach
              </div>
            @endif

            <!-- Tombol aksi -->
            <div class="flex justify-between items-center mt-4 space-x-2">
              @if($item->link_maps)
                <button onclick="openStreetView('{{ $item->link_maps }}')" 
                  class="flex-1 bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded text-sm text-center">
                  <i class="fas fa-map-marker-alt mr-1"></i> Maps
                </button>
              @endif

              <a href="tel:{{ $item->telepon ?? '+123456789' }}" class="bg-green-500 hover:bg-green-600 text-white w-10 h-10 rounded-full flex items-center justify-center">
                <i class="fas fa-phone"></i>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <script>
    function openStreetView(url) {
      window.open(url, "_blank");
    }

    // Dropdown functionality
    const toggle = document.getElementById('dropdownToggle');
    const menu = document.getElementById('dropdownMenu');

    toggle.addEventListener('click', (e) => {
      e.stopPropagation();
      menu.classList.toggle('hidden');
    });

    document.addEventListener('click', () => {
      menu.classList.add('hidden');
    });
  </script>
</body>
</html>