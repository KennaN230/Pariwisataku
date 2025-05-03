<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Pariwisataku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-100 to-white min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
    <h1 class="text-2xl font-bold text-center text-blue-600 mb-6">Daftar Akun Pariwisataku</h1>
    <form action="{{ url('/register') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="name" class="block text-gray-700 mb-1">Nama Lengkap</label>
        <input type="text" id="name" name="name" required class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
    </div>
    <div>
        <label for="email" class="block text-gray-700 mb-1">Email</label>
        <input type="email" id="email" name="email" required class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
    </div>
    <div>
        <label for="password" class="block text-gray-700 mb-1">Password</label>
        <input type="password" id="password" name="password" required class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
    </div>
    <div>
        <label for="password_confirmation" class="block text-gray-700 mb-1">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
    </div>
    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">Daftar</button>
    <p class="text-center text-sm text-gray-600 mt-4">
        Sudah punya akun? <a href="/login" class="text-blue-500 hover:underline">Login di sini</a>
    </p>
</form>
  </div>
</body>
</html>
