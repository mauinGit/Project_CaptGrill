@extends('layouts.app')

@section('title', 'Riwayat Pembelian - CAPT.grill')

@section('content')
    <div class="space-y-4 sm:space-y-6 lg:space-y-8">
        <!-- Header dengan Gradient Modern -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-amber-400 via-yellow-300 to-amber-200 rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-10 shadow-2xl">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-[#ffde59]/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-green-500/10 rounded-full blur-3xl"></div>

            <div class="relative flex items-center gap-4 sm:gap-6">
                <div
                    class="bg-gradient-to-br from-[#113a25] to-green-700 p-3 sm:p-4 rounded-xl sm:rounded-2xl shadow-lg transform hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-[#ffde59]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-[#113a25] font-bitter font-bold text-2xl sm:text-3xl lg:text-4xl mb-1">
                        Riwayat Pembelian
                    </h1>
                    <p class="text-[#113a25]/80 text-sm sm:text-base lg:text-lg">Kelola dan pantau transaksi Anda</p>
                </div>
            </div>
        </div>

        <!-- Filter Section dengan Card Modern -->
        <div
            class="bg-gradient-to-br from-amber-400 via-yellow-300 to-amber-200 rounded-2xl sm:rounded-3xl p-5 sm:p-6 lg:p-8 shadow-lg border border-amber-400">
            <div class="flex items-center gap-3 mb-5 sm:mb-6">
                <div class="bg-gradient-to-br from-[#113a25] to-green-700 p-2.5 sm:p-3 rounded-xl">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#ffde59]" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                        </path>
                    </svg>
                </div>
                <h2 class="text-[#113a25] font-bitter font-bold text-lg sm:text-xl lg:text-2xl">Filter Periode</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                <div class="space-y-2">
                    <label class="block text-[#113a25] font-semibold text-sm sm:text-base">Dari Tanggal</label>
                    <input type="date" id="start-date"
                        class="w-full px-4 py-3 rounded-xl border-2 border-[#113a25] bg-[#113a25]/15 text-[#0b2f1c] focus:border-[#113a25] focus:ring-4 focus:ring-[#113a25]/50 focus:bg-[#113a25]/50 outline-none transition-all duration-300 text-sm sm:text-base">
                </div>

                <div class="space-y-2">
                    <label class="block text-[#113a25] font-semibold text-sm sm:text-base">Sampai Tanggal</label>
                    <input type="date" id="end-date"
                        class="w-full px-4 py-3 rounded-xl border-2 border-[#113a25] bg-[#113a25]/15 text-[#0b2f1c] focus:border-[#113a25] focus:ring-4 focus:ring-[#113a25]/50 focus:bg-[#113a25]/50 outline-none transition-all duration-300 text-sm sm:text-base">
                </div>

                <div class="flex items-end sm:col-span-2 lg:col-span-1">
                    <button id="filter-btn"
                        class="w-full bg-gradient-to-r from-[#113a25] to-green-700 text-[#ffde59] px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 text-sm sm:text-base flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Tampilkan Data
                    </button>
                </div>
            </div>
        </div>

        <!-- Table dengan Design Modern -->
        <div class="bg-gradient-to-br from-amber-400 via-yellow-300 to-amber-200 rounded-2xl sm:rounded-3xl shadow-lg border border-amber-400 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[800px]">
                    <thead>
                        <tr class="bg-gradient-to-r from-[#113a25] to-green-700">
                            <th
                                class="text-left py-4 sm:py-5 px-4 sm:px-6 text-[#ffde59] font-bold font-bitter text-sm sm:text-base whitespace-nowrap">
                                No.</th>
                            <th
                                class="text-left py-4 sm:py-5 px-4 sm:px-6 text-[#ffde59] font-bold font-bitter text-sm sm:text-base whitespace-nowrap">
                                Tanggal</th>
                            <th
                                class="text-left py-4 sm:py-5 px-4 sm:px-6 text-[#ffde59] font-bold font-bitter text-sm sm:text-base whitespace-nowrap">
                                Nama Customer</th>
                            <th
                                class="text-left py-4 sm:py-5 px-4 sm:px-6 text-[#ffde59] font-bold font-bitter text-sm sm:text-base whitespace-nowrap">
                                Pembayaran</th>
                            <th
                                class="text-left py-4 sm:py-5 px-4 sm:px-6 text-[#ffde59] font-bold font-bitter text-sm sm:text-base whitespace-nowrap">
                                Pesanan</th>
                            <th
                                class="text-right py-4 sm:py-5 px-4 sm:px-6 text-[#ffde59] font-bold font-bitter text-sm sm:text-base whitespace-nowrap">
                                Total (Rp)</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="divide-y divide-[#ffde59]">
                        @foreach ($orders as $index => $order)
                            <tr class="hover:bg-[#ffde59] transition-colors duration-200 group">
                                <td class="py-4 px-4 sm:px-6 text-[#113a25] font-bold text-sm sm:text-base">
                                    <span
                                        class="inline-flex items-center justify-center w-8 h-8 bg-[#113a25]/10 group-hover:bg-[#113a25] group-hover:text-[#ffde59] rounded-lg transition-colors duration-200 text-xs sm:text-sm font-bold">
                                        {{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}
                                    </span>
                                </td>
                                <td
                                    class="py-4 px-4 sm:px-6 text-[#113a25] font-bold text-sm sm:text-base whitespace-nowrap">
                                    {{ $order->created_at->format('d-m-Y H:i:s') }}
                                </td>
                                <td class="py-4 px-4 sm:px-6 text-[#113a25] font-semibold text-sm sm:text-base">
                                    {{ $order->customer_name }}
                                </td>
                                <td class="py-4 px-4 sm:px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs sm:text-sm font-semibold
                                        {{ strtoupper($order->payment_method) === 'CASH' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                        {{ strtoupper($order->payment_method) }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 sm:px-6">
                                    <button
                                        class="lihat-pesanan-btn inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#113a25] to-green-700 text-[#ffde59] font-semibold rounded-lg hover:shadow-lg hover:scale-105 active:scale-95 transition-all duration-300 text-xs sm:text-sm"
                                        data-id="{{ $order->id }}" data-order-code="{{ $order->order_code }}"
                                        data-tanggal="{{ $order->created_at->format('d-m-Y H:i:s') }}"
                                        data-customer="{{ $order->customer_name }}" data-total="{{ $order->total_amount }}">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        <span>Detail</span>
                                    </button>
                                </td>
                                <td
                                    class="py-4 px-4 sm:px-6 text-right text-[#113a25] font-bold text-sm sm:text-base whitespace-nowrap">
                                    Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Modern -->
            <div
                class="flex flex-col sm:flex-row justify-between items-center gap-4 p-5 sm:p-6 bg-gradient-to-r from-[#113a25] to-green-700 border-t border-[#113a25]">
                <div class="text-[#ffde59] font-medium text-sm">
                    Menampilkan <span class="text-[#ffde59] font-bold">{{ $orders->firstItem() ?? 0 }}</span> -
                    <span class="text-[#ffde59] font-bold">{{ $orders->lastItem() ?? 0 }}</span> dari
                    <span class="text-[#ffde59] font-bold">{{ $orders->total() }}</span> transaksi
                </div>

                <!-- Custom Pagination -->
                <div class="flex items-center gap-2">
                    @if ($orders->onFirstPage())
                        <span class="px-3 py-2 rounded-lg bg-gradient-to-br from-amber-400 via-yellow-300 to-amber-200 cursor-not-allowed">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                        </span>
                    @else
                        <a href="{{ $orders->previousPageUrl() }}"
                            class="px-3 py-2 rounded-lg bg-gradient-to-br from-amber-300 via-yellow-200 to-amber-100 border-2 border-[#ffde59] text-[#113a25] hover:border-[#113a25] hover:bg-[#113a25] hover:text-[#113a25] transition-all duration-300 shadow-sm hover:shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </a>
                    @endif

                    @foreach (range(1, $orders->lastPage()) as $page)
                        @if ($page == $orders->currentPage())
                            <span
                                class="px-4 py-2 rounded-lg bg-gradient-to-br from-amber-300 via-yellow-200 to-amber-100 text-[#113a25] font-bold shadow-lg min-w-[40px] text-center">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $orders->url($page) }}"
                                class="px-4 py-2 rounded-lg bg-gradient-to-br from-amber-200 via-yellow-100 to-amber-50 border-[#ffde59] text-[#113a25]/30 hover:border-[#113a25] hover:text-[#113a25] hover:shadow-md transition-all duration-300 font-semibold min-w-[40px] text-center">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    @if ($orders->hasMorePages())
                        <a href="{{ $orders->nextPageUrl() }}"
                            class="px-3 py-2 rounded-lg bg-gradient-to-br from-amber-300 via-yellow-200 to-amber-100 border-2 border-[#ffde59] text-[#113a25] hover:border-[#113a25] hover:bg-[#113a25] hover:text-[#113a25] transition-all duration-300 shadow-sm hover:shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    @else
                        <span class="px-3 py-2 rounded-lg bg-gradient-to-br from-amber-400 via-yellow-300 to-amber-200 cursor-not-allowed">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    @include('partials.order-modal')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('detail-pesanan-modal');
            const closeModalBtn = document.getElementById('close-modal');

            closeModalBtn.addEventListener('click', () => modal.classList.remove('active'));
            modal.addEventListener('click', (e) => {
                if (e.target === modal) modal.classList.remove('active');
            });

            function loadPesananData(id, orderCode, tanggal, customer, total) {
                fetch(`/orders/${id}/details`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('transaksi-id').textContent = orderCode;
                        document.getElementById('transaksi-tanggal').textContent = tanggal;
                        document.getElementById('transaksi-customer').textContent = customer;
                        document.getElementById('transaksi-total').textContent =
                            `Rp ${parseInt(total).toLocaleString('id-ID')}`;
                        document.getElementById('btn-struk').href = `/orders/${id}/struk`;

                        const daftarPesanan = document.getElementById('daftar-pesanan');
                        daftarPesanan.innerHTML = '';

                        data.items.forEach(item => {
                            const itemElement = document.createElement('div');
                            itemElement.className =
                                'flex justify-between items-center py-3 sm:py-4 px-4 sm:px-5 bg-gray-50 rounded-xl border border-gray-100 hover:border-[#113a25]/30 hover:shadow-md transition-all duration-200';
                            itemElement.innerHTML = `
                    <div>
                        <p class="text-gray-900 font-semibold text-sm sm:text-base">${item.name}</p>
                        <p class="text-gray-600 text-xs sm:text-sm mt-1">${item.quantity} × Rp ${parseInt(item.price).toLocaleString('id-ID')}</p>
                    </div>
                    <p class="text-[#113a25] font-bold text-base sm:text-lg">Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</p>
                `;
                            daftarPesanan.appendChild(itemElement);
                        });
                    })
                    .catch(error => console.error('Error fetching order details:', error));
            }

            document.querySelectorAll('.lihat-pesanan-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    loadPesananData(
                        this.getAttribute('data-id'),
                        this.getAttribute('data-order-code'),
                        this.getAttribute('data-tanggal'),
                        this.getAttribute('data-customer'),
                        this.getAttribute('data-total')
                    );
                    modal.classList.add('active');
                });
            });

            const filterBtn = document.getElementById('filter-btn');
            const startDateInput = document.getElementById('start-date');
            const endDateInput = document.getElementById('end-date');

            const urlParams = new URLSearchParams(window.location.search);
            const start = urlParams.get('start_date');
            const end = urlParams.get('end_date');

            if (start && end) {
                startDateInput.value = start;
                endDateInput.value = end;
            } else {
                const today = new Date();
                const sevenDaysAgo = new Date();
                sevenDaysAgo.setDate(today.getDate() - 7);

                startDateInput.valueAsDate = sevenDaysAgo;
                endDateInput.valueAsDate = today;
            }

            filterBtn.addEventListener('click', () => {
                const startDate = startDateInput.value;
                const endDate = endDateInput.value;

                if (!startDate || !endDate) {
                    alert('Harap pilih tanggal mulai dan tanggal akhir');
                    return;
                }

                window.location.href =
                    `{{ route('riwayat-pembelian') }}?start_date=${startDate}&end_date=${endDate}`;
            });
        });
    </script>
@endpush
