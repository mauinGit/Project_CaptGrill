@extends('layouts.app')

@section('title', 'Kasir - CAPT.grill')

@section('content')

    <div class=" w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
            <!-- Kasir Section -->
            <div
                class="bg-gradient-to-br from-[#ffde59] via-[#ffd93d] to-[#ffde59] backdrop-blur-sm rounded-2xl sm:rounded-3xl p-4 sm:p-6 md:p-8 shadow-2xl border border-[#113a25]/10 relative overflow-hidden group hover:shadow-3xl transition-all duration-300 w-full">
                <div
                    class="absolute -bottom-6 -left-6 sm:-bottom-8 sm:-left-8 w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-[#113a25]/10 rounded-full blur-xl">
                </div>

                <div class="flex items-center xl:mt-4 gap-3 sm:gap-4 relative z-10">
                    <!-- Icon Container -->
                    <div
                        class="bg-gradient-to-br from-[#113a25] to-green-700 p-2 sm:p-3 md:p-4 rounded-xl sm:rounded-2xl shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7 lg:w-8 lg:h-8 text-[#ffde59]" fill="none"
                            viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>

                    <!-- Text Content -->
                    <div class="flex-1">
                        <h1
                            class="text-[#113a25] font-bitter font-extrabold text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-3xl tracking-tight mb-1">
                            Kasir
                        </h1>
                        <p
                            class="text-[#113a25]/80 font-semibold text-xs sm:text-sm md:text-base flex items-center gap-1 sm:gap-2">
                            <svg class="w-3 h-3 sm:w-4 sm:h-4 text-[#113a25]/60 flex-shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-xs truncate">Harap Mengisi dengan Benar</span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Date & Time Section -->
            <div
                class="bg-gradient-to-br from-[#ffde59] via-[#ffd93d] to-[#ffde59] backdrop-blur-sm rounded-2xl sm:rounded-3xl p-4 sm:p-6 md:p-8 shadow-2xl border border-[#113a25]/10 relative overflow-hidden group hover:shadow-3xl transition-all duration-300 w-full">
                <div
                    class="absolute -bottom-6 -left-6 sm:-bottom-8 sm:-left-8 w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-[#113a25]/10 rounded-full blur-xl">
                </div>

                <div class="flex items-center gap-3 sm:gap-4 relative z-10">
                    <!-- Icon Container -->
                    <div
                        class="bg-gradient-to-br from-[#113a25] to-green-700 p-2 sm:p-3 md:p-4 rounded-xl sm:rounded-2xl shadow-lg group-hover:scale-110 group-hover:-rotate-3 transition-all duration-300">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7 lg:w-8 lg:h-8 text-[#ffde59]" fill="none"
                            viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                    </div>

                    @php
                        $hari = [
                            'Sunday' => 'Minggu',
                            'Monday' => 'Senin',
                            'Tuesday' => 'Selasa',
                            'Wednesday' => 'Rabu',
                            'Thursday' => 'Kamis',
                            'Friday' => 'Jumat',
                            'Saturday' => 'Sabtu',
                        ];

                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember',
                        ];

                        $dayName = $hari[now()->format('l')];
                        $monthName = $bulan[now()->format('F')];
                    @endphp

                    <!-- Text Content -->
                    <div class="flex-1 min-w-0">
                        <h3
                            class="text-[#113a25] font-bitter font-extrabold text-lg sm:text-xl md:text-2xl lg:text-2xl xl:text-2xl tracking-tight mb-1 sm:mb-2">
                            Tanggal & Waktu
                        </h3>
                        <div class="flex flex-col xs:flex-row xs:items-center gap-1 xs:gap-3">
                            <!-- Tanggal -->
                            <div class="flex items-center gap-1 xs:gap-2">
                                <p
                                    class="text-[#113a25]/80 font-semibold text-xs sm:text-sm md:text-base whitespace-nowrap">
                                    <span id="real-time-day">{{ $dayName }}</span>,
                                    <span id="real-time-date">{{ now()->format('d') }} {{ $monthName }}
                                        {{ now()->format('Y') }}</span>
                                </p>
                            </div>

                            <!-- Separator - hanya tampil di layout horizontal -->
                            <div class="hidden xs:block w-px h-4 bg-[#113a25]/30"></div>

                            <!-- Real-time Clock -->
                            <div class="flex items-center gap-1 xs:gap-2">
                                <svg class="w-3 h-3 sm:w-3 sm:h-3 md:w-4 md:h-4 text-[#113a25]/60 animate-pulse flex-shrink-0"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h2 id="real-time-clock"
                                    class="text-[#113a25] font-mono font-semibold text-xs sm:text-sm md:text-base tracking-wide whitespace-nowrap">
                                    {{ now()->format('H:i:s') }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            {{-- Makanan --}}
            <div>
                <h2 class="bg-[#ffde59]/95 backdrop-blur-sm rounded-[20px] flex items-center gap-10 mb-4">
                    <div
                        class="bg-gradient-to-br from-primary to-green-700 mt-4 mb-4 ml-8 sm:p-3 md:p-4 rounded-lg sm:rounded-xl md:rounded-2xl shadow-lg">

                        <svg viewBox="0 0 512 512" class="w-4 h-4 sm:w-6 sm:h-6 md:w-7 md:h-7 lg:w-8 lg:h-8 text-secondary"
                            fill="none" stroke-width="28" stroke="currentColor" class="size-3">
                            <path
                                d="M464 256H48a48 48 0 0 0 0 96h416a48 48 0 0 0 0-96zm16 128H32a16 16 0 0 0-16 16v16a64 64 0 0 0 64 64h352a64 64 0 0 0 64-64v-16a16 16 0 0 0-16-16zM58.64 224h394.72c34.57 0 54.62-43.9 34.82-75.88C448 83.2 359.55 32.1 256 32c-103.54.1-192 51.2-232.18 116.11C4 180.09 24.07 224 58.64 224zM384 112a16 16 0 1 1-16 16 16 16 0 0 1 16-16zM256 80a16 16 0 1 1-16 16 16 16 0 0 1 16-16zm-128 32a16 16 0 1 1-16 16 16 16 0 0 1 16-16z" />
                        </svg>
                    </div>
                    <span class="text-[#113a25] font-bold text-2xl sm:text-3xl tracking-tight">
                        Makanan
                    </span>
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4">
                    @foreach ($makanan as $item)
                        <div class="bg-[#ffde59] rounded-2xl shadow-md hover:shadow-xl transition transform hover:scale-[1.02] cursor-pointer p-3 flex flex-col"
                            onclick="addToCart({{ $item->id }}, '{{ $item->name }}', {{ $item->price }})">

                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    class="w-full h-24 object-cover rounded-xl mb-2">
                            @else
                                <div
                                    class="w-full h-24 bg-gray-100 rounded-xl mb-2 flex items-center justify-center text-gray-400 text-xs">
                                    Tidak ada gambar
                                </div>
                            @endif

                            <div class="flex-1">
                                <h3 class="text-sm font-bold text-[#113a25] leading-tight">{{ $item->name }}</h3>
                            </div>
                            <p class="text-[#113a25] font-semibold text-sm mt-1">
                                Rp {{ number_format($item->price) }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Minuman --}}
            <div>
                <h2 class="bg-[#ffde59] backdrop-blur-sm rounded-[12px] flex items-center gap-3 mb-4">
                    <div
                        class="bg-gradient-to-br from-primary to-green-700 mt-4 mb-4 ml-8 sm:p-3 md:p-4 rounded-lg sm:rounded-xl md:rounded-2xl shadow-lg">

                        <svg viewBox="0 0 64 64" class="w-4 h-4 sm:w-6 sm:h-6 md:w-7 md:h-7 lg:w-8 lg:h-8 text-secondary"
                            fill="none" stroke-width="4" stroke="currentColor" class="size-10">
                            <path
                                d="M47.396 19.126H16.604l3.208 34.837A2.244 2.244 0 0 0 22.046 56h19.908a2.244 2.244 0 0 0 2.234-2.037l3.208-34.837zM13.164 19.126h37.672M34.641 18.765 36.931 8h3.747" />
                            <path d="M35.804 52.665h3.181a2.263 2.263 0 0 0 2.247-1.996l.844-7.089" />
                        </svg>
                    </div>

                    <span class="text-primary font-bold text-2xl sm:text-3xl tracking-tight">
                        Minuman
                    </span>
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
                    @foreach ($minuman as $item)
                        <div class="bg-[#ffde59] rounded-2xl shadow-md hover:shadow-xl transition transform hover:scale-[1.02] cursor-pointer p-3 flex flex-col"
                            onclick="addToCart({{ $item->id }}, '{{ $item->name }}', {{ $item->price }})">

                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    class="w-full h-24 object-cover rounded-xl mb-2">
                            @else
                                <div
                                    class="w-full h-24 bg-gray-100 rounded-xl mb-2 flex items-center justify-center text-gray-400 text-xs">
                                    Tidak ada gambar
                                </div>
                            @endif

                            <div class="flex-1">
                                <h3 class="text-sm font-bold text-gray-900 leading-tight">{{ $item->name }}</h3>
                            </div>
                            <p class="text-primary font-semibold text-sm mt-1">
                                Rp {{ number_format($item->price) }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Right Section - Cart -->
        <div
            class="bg-[#ffde59] rounded-lg sm:rounded-xl md:rounded-2xl lg:rounded-2xl shadow-lg sm:shadow-xl md:shadow-2xl p-3 sm:p-4 md:p-5 xl:p-7 flex flex-col border border-[#113a25]">
            <!-- Header dengan gradient modern -->
            <div
                class="flex items-center gap-2 sm:gap-3 md:gap-4 p-3 sm:p-4 md:p-5 lg:p-3 bg-gradient-to-br from-[#113a25] via-green-700 to-teal-600 rounded-lg sm:rounded-xl md:rounded-2xl shadow-md sm:shadow-lg relative overflow-hidden">
                <!-- Decorative elements -->
                <div
                    class="absolute top-0 right-0 w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 lg:w-28 lg:h-28 xl:w-32 xl:h-32 bg-white/10 rounded-full -mr-8 sm:-mr-10 md:-mr-12 lg:-mr-14 xl:-mr-16 -mt-8 sm:-mt-10 md:-mt-12 lg:-mt-14 xl:-mt-16">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 bg-white/5 rounded-full -ml-6 sm:-ml-8 md:-ml-10 lg:-ml-12 -mb-6 sm:-mb-8 md:-mb-10 lg:-mb-12">
                </div>

                <div
                    class="bg-white/20 backdrop-blur-sm p-1.5 sm:p-2 md:p-2.5 lg:p-3 rounded-lg sm:rounded-xl relative z-10">
                    <svg viewBox="0 0 24 24"
                        class="w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5 lg:w-6 lg:h-6 xl:w-7 xl:h-7 text-[#ffde59]"
                        fill="none" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </div>

                <h2
                    class="text-[#ffde59] font-bold text-lg sm:text-xl md:text-lg xl:text-2xl tracking-tight relative z-10 truncate">
                    Keranjang
                </h2>
            </div>

            <!-- Empty state -->
            <div id="cart-empty"
                class="flex flex-col items-center justify-center py-6 sm:py-8 md:py-4 xl:py-12 px-2 sm:px-4">
                <div class="bg-[#113a25] rounded-full p-3 sm:p-4 md:p-5 lg:p-6 mb-2 sm:mb-3 md:mb-4">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 md:w-8 md:h-8 xl:w-16 xl:h-16 text-[#ffde59]" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <p class="text-[#113a25] text-sm sm:text-base lg:text-[10px] xl:text-lg font-bold text-center">Belum ada
                    item yang dipilih</p>
                <p class="text-[#113a25] text-xs sm:text-sm lg:text-[10px] xl:text-lg  mt-0.5 sm:mt-1 text-center">Mulai
                    tambahkan produk ke keranjang
                </p>
            </div>

            <!-- Cart items -->
            <div id="cart-items"
                class="space-y-2 sm:space-y-3 max-h-48 sm:max-h-56 md:max-h-64 lg:max-h-72 xl:max-h-80 overflow-y-auto hidden mt-3 sm:mt-4 md:mt-5 pr-1 sm:pr-2">
                <!-- item keranjang dirender via JS -->
            </div>

            <!-- Summary Section -->
            <div class="border-t border-[#113a25] mt-3 sm:mt-4 md:mt-5 lg:mt-6 pt-3 sm:pt-4 md:pt-5">
                <!-- Hanya Total saja -->
                <div
                    class="flex justify-between items-center bg-gradient-to-r from-[#113a25] to-green-700 rounded-lg sm:rounded-xl p-2 sm:p-3 md:p-4">
                    <span
                        class="text-[#ffde59] font-bold text-sm sm:text-base md:text-base lg:text-lg xl:text-xl truncate">
                        Total
                    </span>
                    <span id="total-text"
                        class="font-bold text-[#ffde59] text-base sm:text-lg md:text-lg xl:text-lg` truncate">
                        Rp 0
                    </span>
                </div>
            </div>

            <!-- Payment Info Form -->
            <div class="mt-3 sm:mt-4 md:mt-5 lg:mt-6 space-y-2 sm:space-y-3 md:space-y-4 text-xs sm:text-sm">
                <div>
                    <label
                        class=" text-[#113a25] font-medium mb-1 sm:mb-2 flex items-center gap-1 sm:gap-2 text-xs sm:text-sm">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4 text-[#113a25] flex-shrink-0" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="text-xs sm:text-base md:text-xs truncate font-bold">Nama Pelanggan</span>
                    </label>
                    <input type="text" id="customer_name"
                        class="w-full rounded-lg sm:rounded-xl px-2 sm:px-3 md:px-4 py-1.5 sm:py-2 md:py-3 bg-gradient-to-r from-[#113a25] to-green-700 font-semibold text-[#ffde59] placeholder-[#ffde59]/70 focus:ring-1 sm:focus:ring-2 focus:ring-[#ffde59] focus:outline-none transition-all text-xs sm:text-sm"
                        placeholder="Masukkan nama pelanggan">
                </div>

                <div>
                    <label
                        class="text-[#113a25] font-medium mb-1 sm:mb-2 flex items-center gap-1 sm:gap-2 text-xs sm:text-sm">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4 text-[#113a25] flex-shrink-0" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <span class="text-xs sm:text-base md:text-xs truncate font-bold">Metode Pembayaran</span>
                    </label>
                    <select id="payment_method"
                        class="w-full rounded-lg sm:rounded-xl px-2 sm:px-3 md:px-4 py-1.5 sm:py-2 md:py-3 bg-gradient-to-r from-[#113a25] to-green-700 font-semibold text-[#ffde59] focus:ring-1 sm:focus:ring-2 focus:ring-[#ffde59] focus:outline-none transition-all cursor-pointer appearance-none text-xs sm:text-sm">
                        @foreach ($paymentMethods as $method)
                            <option value="{{ $method }}" class="bg-white text-gray-800 text-sm">
                                {{ strtoupper($method) }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label
                        class=" text-[#113a25] font-medium mb-1 sm:mb-2 flex items-center gap-1 sm:gap-2 text-xs sm:text-sm">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4 text-[#113a25] flex-shrink-0" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-xs sm:text-base md:text-xs truncate font-bold">Uang Diterima</span>
                    </label>
                    <input type="text" id="cash_given"
                        class="w-full rounded-lg sm:rounded-xl px-2 sm:px-3 md:px-4 py-1.5 sm:py-2 md:py-3 bg-gradient-to-r from-[#113a25] to-green-700 font-semibold text-[#ffde59] focus:ring-1 sm:focus:ring-2 focus:ring-[#ffde59] focus:outline-none transition-all text-xs sm:text-sm"
                        placeholder="0">
                </div>

                <div>
                    <label
                        class=" text-[#113a25] font-medium mb-1 sm:mb-2 flex items-center gap-1 sm:gap-2 text-xs sm:text-sm">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4 text-[#113a25] flex-shrink-0" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                        </svg>
                        <span class="text-xs sm:text-base md:text-xs truncate font-bold">Kembalian</span>
                    </label>
                    <input type="text" id="change_amount"
                        class="w-full rounded-lg sm:rounded-xl px-2 sm:px-3 md:px-4 py-1.5 sm:py-2 md:py-3 bg-gradient-to-r from-[#113a25] to-green-700 font-semibold text-[#ffde59] text-xs sm:text-sm"
                        readonly placeholder="Rp 0">
                </div>
            </div>

            <!-- Process Button -->
            <button id="btn-proses"
                class="mt-3 sm:mt-4 md:mt-5 lg:mt-6 w-full bg-gradient-to-r from-[#113a25] to-green-700 text-[#ffde59] py-2 sm:py-3 md:py-4 rounded-lg sm:rounded-xl font-bold text-sm sm:text-base shadow-md sm:shadow-lg hover:shadow-lg sm:hover:shadow-xl hover:scale-[1.02] active:scale-[0.98] transition-all disabled:opacity-60 disabled:cursor-not-allowed disabled:hover:scale-100 flex items-center justify-center gap-1 sm:gap-2 group">
                <svg class="w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5 group-hover:rotate-12 transition-transform flex-shrink-0"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                <span class="text-xs sm:text-base md:text-xs truncate font-bold">Proses & Cetak Struk</span>
            </button>
        </div>

        <!-- Confirmation Modal -->
        <div id="confirm-modal"
            class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-2xl p-8 w-full max-w-md shadow-2xl transform transition-all">
                <div class="flex items-center gap-3 mb-6">
                    <div class="bg-emerald-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Konfirmasi Pesanan</h2>
                </div>

                <div id="confirm-items" class="space-y-2 text-sm mb-5 max-h-48 overflow-y-auto bg-gray-50 rounded-xl p-4">
                </div>

                <div class="space-y-3 mb-6 bg-gradient-to-br from-emerald-50 to-green-50 rounded-xl p-4">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-600">Total</span>
                        <span id="confirm-total" class="font-bold text-lg text-emerald-600"></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-600">Uang Diterima</span>
                        <span id="confirm-cash" class="font-semibold text-gray-700"></span>
                    </div>
                    <div class="flex justify-between items-center pt-3 border-t border-emerald-200">
                        <span class="text-sm font-medium text-gray-600">Kembalian</span>
                        <span id="confirm-change" class="font-bold text-lg text-gray-800"></span>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button id="cancel-btn"
                        class="flex-1 px-5 py-3 rounded-xl bg-gray-100 hover:bg-gray-200 font-semibold text-gray-700 transition-all active:scale-95">
                        Batal
                    </button>
                    <button id="confirm-btn"
                        class="flex-1 px-5 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-bold shadow-lg hover:shadow-xl transition-all active:scale-95">
                        Konfirmasi
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const csrfToken = '{{ csrf_token() }}';
        let cart = [];

        function formatRupiah(num) {
            return 'Rp ' + Number(num).toLocaleString('id-ID');
        }

        function updateRealTimeClock() {
            const now = new Date();

            // Update time
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('real-time-clock').textContent = `${hours}:${minutes}:${seconds}`;

            // Update day and date (in case it crosses midnight)
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ];

            document.getElementById('real-time-day').textContent = days[now.getDay()];
            document.getElementById('real-time-date').textContent =
                `${String(now.getDate()).padStart(2, '0')} ${months[now.getMonth()]} ${now.getFullYear()}`;
        }

        // Update immediately and then every second
        updateRealTimeClock();
        setInterval(updateRealTimeClock, 1000);

        function renderCart() {
            console.log('renderCart dipanggil, cart:', cart);

            const cartItemsDiv = document.getElementById('cart-items');
            const cartEmptyDiv = document.getElementById('cart-empty');

            cartItemsDiv.innerHTML = '';

            if (cart.length === 0) {
                cartItemsDiv.classList.add('hidden');
                cartEmptyDiv.classList.remove('hidden');
            } else {
                cartItemsDiv.classList.remove('hidden');
                cartEmptyDiv.classList.add('hidden');

                cart.forEach((item, index) => {
                    const div = document.createElement('div');
                    div.className =
                        'flex items-center justify-between bg-white border border-gray-200 rounded-lg lg:rounded-md p-1.5 sm:p-2 md:p-3 lg:p-2 hover:shadow-sm lg:hover:shadow transition-all duration-200';

                    div.innerHTML = `
    <div class="flex items-center gap-1 sm:gap-1.5 md:gap-2 lg:gap-1.5 flex-1 min-w-0">
        <div class="bg-emerald-50 p-1 sm:p-1.5 md:p-2 lg:p-1 rounded-md sm:rounded-lg flex-shrink-0">
            <svg class="w-2.5 h-2.5 sm:w-3.5 sm:h-3.5 md:w-4 md:h-4 lg:w-3.5 lg:h-3.5 text-emerald-600" 
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
            </svg>
        </div>
        <div class="flex-1 min-w-0 py-1">
            <h3 class="font-medium text-gray-800 text-xs lg:text-[8px] xl:text-sm truncate leading-tight xl:mb-2">${item.name}</h3>
            <p class="text-emerald-600 font-semibold text-xs lg:text-[8px] xl:text-sm truncate">${formatRupiah(item.price)}</p>
        </div>
    </div>
    <div class="flex items-center gap-1 sm:gap-1.5 md:gap-2 lg:gap-1 flex-shrink-0">
        <div class="flex items-center gap-0.5 sm:gap-1 bg-gray-50 rounded-md sm:rounded-lg px-1 sm:px-1.5 md:px-2 lg:px-0.5 xl:2.5 py-0.5 sm:py-1">
            <button class="quantity-btn decrease text-gray-500 hover:text-emerald-600 transition-colors w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 flex items-center justify-center text-xs lg:text-[8px] xl:text-sm" 
                                onclick="updateQty(${index}, ${item.quantity - 1})">-</button>
            
            <input type="number" 
                   class="quantity-input w-6 sm:w-8 md:w-10 lg:w-4 xl:w-10 text-center bg-transparent border-none 
                          focus:outline-none focus:ring-1 focus:ring-emerald-500 rounded font-medium 
                          text-gray-800 lg:text-[8px] xl:text-sm" 
                   value="${item.quantity}" 
                   min="1"
                   onchange="updateQtyFromInput(${index}, this.value)"
                   onblur="validateQuantity(${index}, this)">
            
            <button class="quantity-btn increase text-gray-500 hover:text-emerald-600 transition-colors 
                          w-3.5 h-3.5 sm:w-4 sm:h-4 md:w-5 md:h-5 lg:w-4 lg:h-4 flex items-center justify-center lg:text-[8px] xl:text-sm" 
                    onclick="updateQty(${index}, ${item.quantity + 1})">+</button>
        </div>
        <button class="remove-btn p-0.5 sm:p-1 lg:p-0.5 text-gray-400 hover:text-red-500 
                      transition-colors flex-shrink-0" 
                onclick="removeItem(${index})">
            <svg class="w-2.5 h-2.5 sm:w-3.5 sm:h-3.5 md:w-4 md:h-4 lg:w-3.5 lg:h-3.5" 
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>
    </div>
`;
                    cartItemsDiv.appendChild(div);
                });
            }

            updateTotal();
        }

        function updateQtyFromInput(index, value) {
            console.log('updateQtyFromInput dipanggil:', index, value);
            const qty = Number(value);

            if (qty <= 0 || isNaN(qty)) {
                // Jika nilai tidak valid, kembalikan ke quantity sebelumnya
                renderCart();
                return;
            }

            cart[index].quantity = qty;
            renderCart();
        }

        function validateQuantity(index, inputElement) {
            const value = inputElement.value;
            const qty = Number(value);

            if (qty <= 0 || isNaN(qty) || value === '') {
                // Jika nilai tidak valid, set ke 1
                cart[index].quantity = 1;
                renderCart();
            }
        }

        // Tambahkan juga event listener untuk handle Enter key
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('keypress', function(e) {
                if (e.target.classList.contains('quantity-input') && e.key === 'Enter') {
                    e.target.blur(); // Trigger onchange/onblur event
                }
            });
        });

        function updateTotal() {
            let total = 0; // Ganti dari 'subtotal' menjadi 'total'
            cart.forEach(item => total += item.price * item.quantity);

            const cashValue = document.getElementById('cash_given').value.replace(/\D/g, '');
            const cash = Number(cashValue || 0);
            const change = Math.max(cash - total, 0);

            // Hanya update total-text
            document.getElementById('total-text').textContent = formatRupiah(total);
            document.getElementById('change_amount').value = formatRupiah(change);

            // Validasi uang diterima
            const btnProses = document.getElementById('btn-proses');
            const cashGiven = document.getElementById('cash_given');

            if (cash < total && total > 0) {
                cashGiven.classList.add('border-red-500', 'bg-red-50');
                cashGiven.classList.remove('border-gray-200', 'bg-gray-50');
                btnProses.disabled = true;
            } else {
                cashGiven.classList.remove('border-red-500', 'bg-red-50');
                cashGiven.classList.add('border-gray-200', 'bg-gray-50');
                btnProses.disabled = (cart.length === 0 || total === 0);
            }
        }

        function addToCart(id, name, price) {
            console.log('addToCart dipanggil:', id, name, price);
            const existing = cart.find(item => item.id === id);
            if (existing) {
                existing.quantity += 1;
            } else {
                cart.push({
                    id,
                    name,
                    price,
                    quantity: 1
                });
            }
            renderCart();
        }

        function updateQty(index, value) {
            console.log('updateQty dipanggil:', index, value);
            const qty = Number(value);
            if (qty <= 0) {
                removeItem(index);
                return;
            }
            cart[index].quantity = qty;
            renderCart();
        }

        function removeItem(index) {
            console.log('removeItem dipanggil:', index);
            cart.splice(index, 1);
            renderCart();
        }

        // Event Listeners untuk input uang
        document.getElementById('cash_given').addEventListener('input', function() {
            const value = this.value.replace(/\D/g, '');
            this.value = value ? Number(value).toLocaleString('id-ID') : '';
            updateTotal();
        });

        document.getElementById('cash_given').addEventListener('blur', function() {
            const value = this.value.replace(/\D/g, '');
            this.value = value ? Number(value).toLocaleString('id-ID') : '';
        });

        /* ===============================
           BUTTON PROSES - SIMPLE VERSION
        =================================*/
        document.getElementById('btn-proses').addEventListener('click', function() {
            console.log('Tombol proses diklik');

            if (cart.length === 0) {
                alert('Keranjang masih kosong');
                return;
            }

            let total = 0; // Ganti dari subtotal ke total
            cart.forEach(item => total += item.price * item.quantity);

            const cash_given = Number(document.getElementById('cash_given').value.replace(/\D/g, '') || 0);

            // Validasi uang diterima
            if (cash_given < total) {
                alert('Uang yang diterima kurang dari total pembayaran!');
                document.getElementById('cash_given').focus();
                return;
            }

            // Tampilkan modal konfirmasi
            showConfirmationModal();
        });

        function showConfirmationModal() {
            console.log('showConfirmationModal dipanggil');

            let total = 0; // Ganti dari subtotal ke total
            cart.forEach(item => total += item.price * item.quantity);

            const customer_name = document.getElementById('customer_name').value;
            const payment_method = document.getElementById('payment_method').value;
            const cash_given = Number(document.getElementById('cash_given').value.replace(/\D/g, '') || 0);
            const change_amount = Math.max(cash_given - total, 0);

            // Tampilkan items di modal
            let html = '';
            cart.forEach(item => {
                html += `
            <div class="flex justify-between items-center py-1 sm:py-2 border-b border-gray-200 last:border-b-0">
                <div class="min-w-0 flex-1">
                    <span class="font-medium text-gray-800 text-xs sm:text-sm truncate">${item.quantity}x ${item.name}</span>
                </div>
                <span class="font-semibold text-gray-900 text-xs sm:text-sm truncate ml-1 sm:ml-2">${formatRupiah(item.price * item.quantity)}</span>
            </div>
        `;
            });

            document.getElementById('confirm-items').innerHTML = html;
            document.getElementById('confirm-total').textContent = formatRupiah(total); // Ganti dari subtotal ke total
            document.getElementById('confirm-cash').textContent = formatRupiah(cash_given);
            document.getElementById('confirm-change').textContent = formatRupiah(change_amount);

            // Tampilkan modal
            document.getElementById('confirm-modal').classList.remove('hidden');
            console.log('Modal ditampilkan');
        }

        /* ===============================
           BUTTON CONFIRM - SIMPLE VERSION
        =================================*/
        document.getElementById('confirm-btn').addEventListener('click', function() {
            console.log('Tombol confirm diklik');

            const confirmBtn = document.getElementById('confirm-btn');
            const originalText = confirmBtn.innerHTML;

            // Tampilkan loading
            confirmBtn.innerHTML = `
        <svg class="animate-spin h-4 w-4 sm:h-5 sm:w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span class="truncate">Memproses...</span>
    `;
            confirmBtn.disabled = true;

            let total = 0; // Ganti dari subtotal ke total
            cart.forEach(item => total += item.price * item.quantity);

            const payload = {
                customer_name: document.getElementById('customer_name').value,
                payment_method: document.getElementById('payment_method').value,
                cash_given: Number(document.getElementById('cash_given').value.replace(/\D/g, '') || 0),
                change_amount: Math.max(Number(document.getElementById('cash_given').value.replace(/\D/g, '') ||
                    0) - total, 0),
                items: cart.map(item => ({
                    id: item.id,
                    quantity: item.quantity,
                    name: item.name,
                    price: item.price
                }))
            };

            console.log('Payload:', payload);

            fetch('{{ route('kasir.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(payload)
                })
                .then(async res => {
                    console.log('Response status:', res.status);
                    const data = await res.json();
                    console.log('Response data:', data);

                    if (!res.ok) {
                        throw new Error(data.message || 'Gagal memproses pesanan');
                    }
                    return data;
                })
                .then(data => {
                    console.log('Success:', data);

                    // Cetak struk sederhana
                    printSimpleReceipt();

                    // Reset form
                    cart = [];
                    renderCart();
                    document.getElementById('customer_name').value = '';
                    document.getElementById('cash_given').value = '0';
                    document.getElementById('change_amount').value = 'Rp 0';

                    // Tutup modal
                    document.getElementById('confirm-modal').classList.add('hidden');

                    // Tampilkan notifikasi sukses
                    showSuccessNotification('Pesanan berhasil diproses!');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan: ' + error.message);
                })
                .finally(() => {
                    // Reset button
                    confirmBtn.innerHTML = originalText;
                    confirmBtn.disabled = false;
                });
        });

        /* ===============================
           CANCEL BUTTON
        =================================*/
        document.getElementById('cancel-btn').addEventListener('click', function() {
            console.log('Tombol cancel diklik');
            document.getElementById('confirm-modal').classList.add('hidden');
        });

        /* ===============================
           FUNGSI CETAK STRUK SEDERHANA
        =================================*/
        // Di fungsi printSimpleReceipt():
        function printSimpleReceipt() {
            console.log('printSimpleReceipt dipanggil');

            const customerName = document.getElementById('customer_name').value;
            const paymentMethod = document.getElementById('payment_method').value;
            const cashGiven = Number(document.getElementById('cash_given').value.replace(/\D/g, '') || 0);

            let total = 0; // Ganti dari 'subtotal' menjadi 'total'
            cart.forEach(item => total += item.price * item.quantity);
            const changeAmount = Math.max(cashGiven - total, 0);

            const receiptContent = `
        <div style="font-family: 'Courier New', monospace; font-size: 12px; width: 58mm; padding: 10px;">
            <div style="text-align: center; margin-bottom: 10px;">
                <h2 style="margin: 0; font-weight: bold;">TOKO ANDA</h2>
                <p style="margin: 0; font-size: 10px;">Alamat Toko Anda</p>
                <p style="margin: 0; font-size: 10px;">Telp: 08123456789</p>
            </div>
            
            <hr style="border: 0; border-top: 1px dashed #000; margin: 10px 0;">
            
            <div style="margin-bottom: 10px;">
                <p style="margin: 2px 0;"><strong>No:</strong> #${Date.now()}</p>
                <p style="margin: 2px 0;"><strong>Tanggal:</strong> ${new Date().toLocaleString('id-ID')}</p>
                ${customerName ? `<p style="margin: 2px 0;"><strong>Pelanggan:</strong> ${customerName}</p>` : ''}
            </div>
            
            <hr style="border: 0; border-top: 1px dashed #000; margin: 10px 0;">
            
            <div style="margin-bottom: 10px;">
                ${cart.map(item => `
                            <div style="display: flex; justify-content: space-between; margin: 3px 0;">
                                <span>${item.quantity}x ${item.name}</span>
                                <span>Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</span>
                            </div>
                        `).join('')}
            </div>
            
            <hr style="border: 0; border-top: 1px dashed #000; margin: 10px 0;">
            
            <div style="margin-bottom: 10px;">
                <div style="display: flex; justify-content: space-between; margin: 3px 0;">
                    <span><strong>TOTAL:</strong></span>
                    <span><strong>Rp ${total.toLocaleString('id-ID')}</strong></span>
                </div>
                <div style="display: flex; justify-content: space-between; margin: 3px 0;">
                    <span>Bayar:</span>
                    <span>Rp ${cashGiven.toLocaleString('id-ID')}</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin: 3px 0;">
                    <span>Kembali:</span>
                    <span>Rp ${changeAmount.toLocaleString('id-ID')}</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin: 3px 0;">
                    <span>Metode:</span>
                    <span>${paymentMethod.toUpperCase()}</span>
                </div>
            </div>
            
            <hr style="border: 0; border-top: 1px dashed #000; margin: 10px 0;">
            
            <div style="text-align: center; margin-top: 15px;">
                <p style="margin: 5px 0; font-size: 10px;">Terima kasih atas kunjungan Anda</p>
            </div>
        </div>
    `;

            const printWindow = window.open('', '_blank', 'width=250,height=600');
            printWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Struk Pembayaran</title>
        </head>
        <body onload="window.print(); setTimeout(() => window.close(), 500);">
            ${receiptContent}
        </body>
        </html>
    `);
            printWindow.document.close();
        }

        function showSuccessNotification(message) {
            const notification = document.createElement('div');
            notification.className =
                'fixed top-2 sm:top-4 right-2 sm:right-4 bg-emerald-500 text-white px-3 sm:px-4 md:px-6 py-1.5 sm:py-2 md:py-3 rounded-lg sm:rounded-xl shadow-md sm:shadow-lg z-50 transform translate-x-0 opacity-100 transition-all duration-300 max-w-[calc(100vw-1rem)]';
            notification.innerHTML = `
        <div class="flex items-center gap-1 sm:gap-2">
            <svg class="w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5 text-white flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="font-medium text-xs sm:text-sm md:text-base truncate">${message}</span>
        </div>
    `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                notification.style.opacity = '0';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Initialize
        console.log('JavaScript loaded');
        renderCart();
    </script>
@endsection
