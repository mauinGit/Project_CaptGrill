{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CAPT.grill</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .bitter-semibold {
            font-family: 'Bitter', serif;
            font-weight: 600;
        }
        
        .login-container {
            background: linear-gradient(135deg, #FFDE59 0%, #FFDE59 100%);
            backdrop-filter: blur(10px);
        }
        
        .input-field {
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            transform: translateY(-2px);
        }
        
        .login-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(26, 89, 57, 0.3);
        }
        
        .login-btn:active {
            transform: translateY(0);
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .bg-pattern {
            background-image: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                              radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#1A5939] via-[#165032] to-[#0f3a24] min-h-screen flex items-center justify-center p-4 bg-pattern">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-96 h-96 bg-[#FFDE59] rounded-full opacity-10 blur-3xl -top-48 -left-48"></div>
        <div class="absolute w-96 h-96 bg-green-300 rounded-full opacity-10 blur-3xl -bottom-48 -right-48"></div>
    </div>

    <div class="login-container w-full max-w-md rounded-3xl shadow-2xl p-8 md:p-12 relative z-10 animate-fade-in-up">
        <!-- Logo Section -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-6">
                <div class="w-56 h-24 flex items-center justify-center transform hover:scale-105 transition-transform duration-300">
                    <div class="bitter-semibold text-3xl text-[#1A5939]">
                        <img src="{{ asset('images/logo warna.png') }}" alt="">
                    </div>
                </div>
            </div>
            <h1 class="bitter-semibold text-3xl text-[#113a25] mb-2">Selamat Datang</h1>
            <p class="text-gray-600 text-sm">Silakan login untuk melanjutkan</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg animate-fade-in-up">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-sm text-red-700 font-medium">{{ $errors->first() }}</p>
                </div>
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            
            <!-- Email Field -->
            <div class="space-y-2">
                <label for="email" class="block text-gray-700 font-semibold text-sm">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                        </svg>
                    </div>
                    <input 
                        type="email" 
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full pl-12 pr-4 py-3.5 bg-white border-2 border-yellow-200 rounded-xl focus:outline-none focus:border-[#1A5939] focus:ring-4 focus:ring-[#1A5939]/10 input-field text-gray-700 placeholder-gray-400"
                        placeholder="Masukkan email"
                        required
                    >
                </div>
            </div>

            <!-- Password Field -->
            <div class="space-y-2">
                <label for="password" class="block text-gray-700 font-semibold text-sm">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <input 
                        type="password" 
                        id="password"
                        name="password"
                        class="w-full pl-12 pr-4 py-3.5 bg-white border-2 border-yellow-200 rounded-xl focus:outline-none focus:border-[#1A5939] focus:ring-4 focus:ring-[#1A5939]/10 input-field text-gray-700 placeholder-gray-400"
                        placeholder="Masukkan password"
                        required
                    >
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer group">
                    <input 
                        type="checkbox" 
                        name="remember"
                        class="w-4 h-4 rounded border-2 border-yellow-300 text-[#1A5939] focus:ring-[#1A5939] focus:ring-offset-0 transition-colors"
                    >
                    <span class="text-sm text-gray-700 group-hover:text-gray-900 transition-colors">Ingat saya</span>
                </label>
            </div>

            <!-- Login Button -->
            <button 
                type="submit" 
                class="w-full bg-gradient-to-r from-[#1A5939] to-[#165032] text-white py-3.5 rounded-xl font-bold text-base shadow-lg login-btn mt-8"
            >
                <span class="flex items-center justify-center gap-2">
                    Masuk
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </span>
            </button>
        </form>

        <!-- Footer Text -->
        <div class="mt-6 text-center space-y-2">
            <p class="text-gray-600 text-xs">CAPT.grill © 2025</p>
        </div>
    </div>
</body>
</html>