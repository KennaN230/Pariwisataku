<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Pariwisataku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-100 to-white min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
    <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Login ke Pariwisataku</h1>

    {{-- Tampilkan error kalau ada --}}
    @if($errors->any())
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        {{ $errors->first() }}
      </div>
    @endif

    {{-- Tampilkan pesan sukses (jika baru register) --}}
    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ url('/login') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label for="email" class="block text-gray-700 mb-1">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
      </div>
      <div>
        <label for="password" class="block text-gray-700 mb-1">Password</label>
        <input type="password" id="password" name="password" required class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
      </div>
      
      {{-- Kalau mau login pakai Google, pastikan /auth/google sudah diatur --}}
      <a href="/auth/google" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 flex items-center justify-center space-x-2">
        <img src="https://cdn-icons-png.flaticon.com/512/281/281764.png" class="w-5 h-5" alt="Google Logo">
        <span>Login dengan Google</span>
      </a>

      <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">Login</button>

      <p class="text-center text-sm text-gray-600 mt-4">
        Belum punya akun? <a href="/register" class="text-blue-500 hover:underline">Daftar di sini</a>
      </p>
    </form>
  </div>
</body>
</html>
