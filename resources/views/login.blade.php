<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Desa Parigi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-sky-50 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-lg rounded-2xl w-full max-w-md p-8 space-y-6">
    <div class="text-center">
      <img src="/images/logo.png" alt="Logo Desa Parigi" class="mx-auto h-20 w-20">
      <h2 class="mt-4 text-2xl font-bold text-gray-800">Masuk</h2>
      <p class="text-sm text-gray-600">Selamat datang di sistem informasi Desa Parigi</p>
    </div>

    @if ($errors->any())
      <div class="text-red-500 text-sm">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
      @csrf
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" required
          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400"
          value="{{ old('email') }}" />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400" />
      </div>

      <button type="submit"
        class="w-full bg-sky-500 hover:bg-sky-600 text-white font-semibold py-2 rounded-md transition duration-200">
        Masuk
      </button>
    </form>
  </div>
</body>
</html>
