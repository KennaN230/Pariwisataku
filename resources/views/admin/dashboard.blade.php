@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Statistik Pengunjung -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500">Total Pengunjung</p>
                <h3 class="text-2xl font-bold">1,248</h3>
                <p class="text-green-500 text-sm mt-1">+12% dari bulan lalu</p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <i class="fas fa-users text-blue-600"></i>
            </div>
        </div>
    </div>

    <!-- Statistik Destinasi -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500">Total Destinasi</p>
                <h3 class="text-2xl font-bold">86</h3>
                <p class="text-green-500 text-sm mt-1">+5 destinasi baru</p>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <i class="fas fa-map-marked-alt text-green-600"></i>
            </div>
        </div>
    </div>

    <!-- Statistik Kuliner -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500">Tempat Kuliner</p>
                <h3 class="text-2xl font-bold">42</h3>
                <p class="text-green-500 text-sm mt-1">+3 tempat baru</p>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full">
                <i class="fas fa-utensils text-yellow-600"></i>
            </div>
        </div>
    </div>

    <!-- Statistik User -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500">Total Pengguna</p>
                <h3 class="text-2xl font-bold">1,024</h3>
                <p class="text-green-500 text-sm mt-1">+24 user baru</p>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
                <i class="fas fa-user-plus text-purple-600"></i>
            </div>
        </div>
    </div>
</div>

<!-- Destinasi Terpopuler -->
<div class="bg-white rounded-lg shadow p-6 mb-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">Destinasi Terpopuler</h3>
        <a href="{{ route('destinasi.index') }}" class="text-blue-600 text-sm">Lihat Semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Destinasi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengunjung</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Pantai Papuma</td>
                    <td class="px-6 py-4 whitespace-nowrap">Jember</td>
                    <td class="px-6 py-4 whitespace-nowrap">1,245</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400"></i>
                            <span class="ml-1">4.8</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Gunung Ranti</td>
                    <td class="px-6 py-4 whitespace-nowrap">Jember</td>
                    <td class="px-6 py-4 whitespace-nowrap">982</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400"></i>
                            <span class="ml-1">4.6</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Taman Botani</td>
                    <td class="px-6 py-4 whitespace-nowrap">Jember</td>
                    <td class="px-6 py-4 whitespace-nowrap">876</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400"></i>
                            <span class="ml-1">4.5</span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Aktivitas Terkini -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Aktivitas Terkini</h3>
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="bg-blue-100 p-2 rounded-full mr-3">
                    <i class="fas fa-user-plus text-blue-600"></i>
                </div>
                <div>
                    <p class="font-medium">User baru terdaftar</p>
                    <p class="text-gray-500 text-sm">John Doe mendaftar sebagai pengguna</p>
                    <p class="text-gray-400 text-xs mt-1">2 jam yang lalu</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="bg-green-100 p-2 rounded-full mr-3">
                    <i class="fas fa-map-marked-alt text-green-600"></i>
                </div>
                <div>
                    <p class="font-medium">Destinasi baru ditambahkan</p>
                    <p class="text-gray-500 text-sm">Pantai Teluk Love ditambahkan oleh Admin</p>
                    <p class="text-gray-400 text-xs mt-1">5 jam yang lalu</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
        <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('admin.users.create') }}" class="bg-blue-100 hover:bg-blue-200 text-blue-800 p-4 rounded-lg flex flex-col items-center justify-center transition">
                <i class="fas fa-user-plus text-xl mb-2"></i>
                <span>Tambah User</span>
            </a>
            <a href="{{ route('destinasi.create') }}" class="bg-green-100 hover:bg-green-200 text-green-800 p-4 rounded-lg flex flex-col items-center justify-center transition">
                <i class="fas fa-plus text-xl mb-2"></i>
                <span>Tambah Destinasi</span>
            </a>
            <a href="#" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-800 p-4 rounded-lg flex flex-col items-center justify-center transition">
                <i class="fas fa-utensils text-xl mb-2"></i>
                <span>Tambah Kuliner</span>
            </a>
            <a href="#" class="bg-purple-100 hover:bg-purple-200 text-purple-800 p-4 rounded-lg flex flex-col items-center justify-center transition">
                <i class="fas fa-cog text-xl mb-2"></i>
                <span>Pengaturan</span>
            </a>
        </div>
    </div>
</div>
@endsection