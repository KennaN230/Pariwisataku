<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pariwisataku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-white min-h-screen flex items-center justify-center px-4">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Masuk ke Pariwisataku</h1>

        {{-- Notifikasi error --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Select Bar untuk Tipe Login --}}
        <div class="mb-5">
            <label for="login_type" class="block text-sm font-medium text-gray-700 mb-2">Login Sebagai</label>
            <select id="login_type" name="login_type" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="user">Pengguna Biasa</option>
                <option value="admin">Administrator</option>
            </select>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-5" id="loginForm">
            @csrf
            <input type="hidden" name="is_admin" id="is_admin" value="0">
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required autofocus
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       value="{{ old('email') }}">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 mt-1 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 transition text-white font-semibold py-3 rounded-lg">
                Login
            </button>
        </form>

        <div class="text-center text-sm text-gray-600 mt-6">
            Belum punya akun?
            <a href="{{ url('/register') }}" class="text-blue-500 hover:underline font-medium">Daftar di sini</a>
        </div>
    </div>

    <script>
        // Mengubah form berdasarkan pilihan login
        document.getElementById('login_type').addEventListener('change', function() {
            const isAdmin = this.value === 'admin';
            document.getElementById('is_admin').value = isAdmin ? '1' : '0';
            
            // Ubah teks tombol login
            const loginButton = document.querySelector('#loginForm button[type="submit"]');
            loginButton.textContent = isAdmin ? 'Login sebagai Admin' : 'Login';
            
            // Ubah warna tombol untuk admin
            if (isAdmin) {
                loginButton.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                loginButton.classList.add('bg-purple-600', 'hover:bg-purple-700');
            } else {
                loginButton.classList.remove('bg-purple-600', 'hover:bg-purple-700');
                loginButton.classList.add('bg-blue-600', 'hover:bg-blue-700');
            }
        });
    </script>
</body>
</html>