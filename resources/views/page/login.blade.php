{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Kasir / Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-6 rounded-xl shadow-md w-full max-w-md">
        <h1 class="text-xl font-bold mb-4 text-center">Login Capt.Grill</h1>

        @if ($errors->any())
            <div class="mb-3 text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-3">
            @csrf
            <div>
                <label class="block text-sm mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded-lg px-3 py-2" required
                       value="{{ old('email') }}">
            </div>
            <div>
                <label class="block text-sm mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded-lg px-3 py-2" required>
            </div>
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-1">
                    <input type="checkbox" name="remember" class="rounded">
                    <span>Ingat saya</span>
                </label>
            </div>
            <button type="submit"
                    class="w-full bg-green-700 text-white font-semibold py-2 rounded-lg hover:bg-green-800">
                Login
            </button>
        </form>

        <div class="mt-4 text-center text-xs text-gray-500">
            Admin bisa masuk ke /admin (Filament) setelah login.
        </div>
    </div>
</body>
</html>
