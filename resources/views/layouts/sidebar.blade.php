<aside class="sidebar w-80 fixed lg:static inset-y-0 left-0 z-40 bg-gradient-to-b from-secondary to-yellow-300 shadow-2xl min-h-screen transition-all duration-300 transform -translate-x-full lg:translate-x-0 lg:shadow-none lg:w-56">
    <!-- Logo -->
    <div class="text-center py-8 px-6">
        <div class="bg-white/30 backdrop-blur-sm rounded-2xl p-4 inline-block">
            <img src="{{ asset('images/logo warna.png') }}" 
                 class="w-40 h-auto mx-auto" 
                 alt="CAPILogrill" />
        </div>
    </div>

    <!-- Navigation -->
    <nav class="px-4 space-y-3 xl:space-y-4 lg:px-4">
        <a href="#"
            class="flex items-center gap-3 px-5 py-3.5 rounded-xl text-primary font-semibold font-bitter hover:bg-white/20 backdrop-blur-sm transition-all duration-300 group">
            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <span>Kasir</span>
        </a>
        <div
            class="flex items-center gap-3 px-5 py-3.5 rounded-xl bg-primary text-secondary font-bold font-bitter shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                </path>
            </svg>
            <span>Riwayat Pembelian</span>
        </div>
    </nav>

    <!-- Logout Section (jadi comment dulu) -->
    {{-- <div class="absolute bottom-8 left-0 right-0 px-4">
        <a href="{{ route('logout') }}"
            class="flex items-center justify-center gap-2 px-5 py-3 rounded-xl text-primary font-semibold font-bitter hover:bg-white/20 backdrop-blur-sm transition-all duration-300 group">
            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                </path>
            </svg>
            <span>Logout</span>
        </a>
    </div> --}}
</aside>