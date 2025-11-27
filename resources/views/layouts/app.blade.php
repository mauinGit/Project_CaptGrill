<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'CAPT.grill')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bitter:wght@600;700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a5939',
                        secondary: '#ffde59',
                    },
                    fontFamily: {
                        'bitter': ['Bitter', 'serif'],
                        'inter': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 50;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }

        .modal.active {
            display: flex;
        }

        .animate-in {
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Perbaikan untuk mobile menu button */
        .mobile-menu-btn {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mobile-menu-btn .close-icon {
            display: none;
        }

        .mobile-menu-btn.active .burger-icon {
            display: none;
        }

        .mobile-menu-btn.active .close-icon {
            display: block;
        }

        /* Perbaikan untuk overlay */
        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 40;
            transition: opacity 0.3s ease;
        }

        .overlay.active {
            display: block;
        }

        /* Perbaikan untuk sidebar mobile */
        .sidebar {
            transition: transform 0.3s ease;
        }

        @media (max-width: 1023px) {
            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                bottom: 0;
                transform: translateX(-100%);
                z-index: 45;
                width: 280px;
                max-width: 85vw;
            }

            .sidebar.active {
                transform: translateX(0);
            }
        }
    </style>
    @stack('styles')
</head>

<body class="bg-gradient-to-br from-primary via-primary to-green-900 min-h-screen font-inter">

    <!-- Mobile Menu Button dengan Toggle -->
    <button
        class="mobile-menu-btn fixed top-5 right-5 z-50 bg-secondary hover:bg-yellow-400 p-3 md:p-7 rounded-xl shadow-2xl transition-all duration-300 hover:scal-110 lg:hidden">
        <!-- Burger Icon -->
        <svg class="w-6 h-6 md:w-8 md:h-8 text-primary burger-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <!-- Close Icon -->
        <svg class="w-6 h-6 md:w-8 md:h-8 text-primary close-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <!-- Overlay -->
    <div class="overlay"></div>

    <div class="flex">
        @include('layouts.sidebar')

        <main class="flex-1 min-h-screen p-6 lg:p-10 space-y-6 overflow-x-hidden">
            @yield('content')
        </main>
    </div>


    <!-- Modal Structure -->
    @yield('modal')

    <!-- Scripts -->
    <script>
        // Base JavaScript functionality dengan toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');
            const closeBtn = document.querySelector('.close-btn');

            // Function untuk membuka sidebar
            function openSidebar() {
                sidebar.classList.add('active');
                overlay.classList.add('active');
                mobileMenuBtn.classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            // Function untuk menutup sidebar
            function closeSidebar() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                mobileMenuBtn.classList.remove('active');
                document.body.style.overflow = '';
            }

            // Toggle sidebar ketika burger/close button diklik
            mobileMenuBtn.addEventListener('click', () => {
                if (sidebar.classList.contains('active')) {
                    closeSidebar();
                } else {
                    openSidebar();
                }
            });

            // Tutup sidebar ketika close button di sidebar diklik
            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    closeSidebar();
                });
            }

            // Tutup sidebar ketika overlay diklik
            if (overlay) {
                overlay.addEventListener('click', () => {
                    closeSidebar();
                });
            }

            // Tutup sidebar ketika link di sidebar diklik (mobile)
            document.querySelectorAll('.sidebar a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 1024) {
                        closeSidebar();
                    }
                });
            });

            // Tutup sidebar ketika window di-resize ke desktop size
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) {
                    closeSidebar();
                }
            });

            // Close dengan Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && sidebar.classList.contains('active')) {
                    closeSidebar();
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>