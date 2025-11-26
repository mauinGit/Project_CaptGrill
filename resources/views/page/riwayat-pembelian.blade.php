@extends('layouts.app')

@section('title', 'Riwayat Pembelian - CAPT.grill')

@section('content')
    <!-- Header -->
    <div
        class="bg-white/95 backdrop-blur-sm rounded-lg sm:rounded-xl md:rounded-2xl lg:rounded-3xl p-4 sm:p- md:p-8 shadow-xl sm:shadow-2xl border border-white/20 animate-in">
        <div class="flex items-center gap-3 sm:gap-4">
            <div
                class="bg-gradient-to-br from-primary to-green-700 p-2 sm:p-3 md:p-4 rounded-lg sm:rounded-xl md:rounded-2xl shadow-lg">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7 lg:w-8 lg:h-8 text-secondary" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </div>
            <div>
                <h1 class="text-primary font-bitter font-bold text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl">
                    Riwayat Pembelian</h1>
                <p class="text-gray-600 text-xs sm:text-sm md:text-base mt-0.5 sm:mt-1">Kelola dan pantau transaksi Anda</p>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div
        class="bg-white/95 backdrop-blur-sm rounded-lg sm:rounded-xl md:rounded-2xl lg:rounded-3xl p-4 sm:p-5 md:p-6 lg:p-8 shadow-xl sm:shadow-2xl border border-white/20 animate-in">
        <div class="flex items-center gap-2 sm:gap-3 mb-4 sm:mb-5 md:mb-6">
            <div class="bg-primary/10 p-2 sm:p-2.5 rounded-lg sm:rounded-xl">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                    </path>
                </svg>
            </div>
            <h2 class="text-primary font-bitter font-bold text-base sm:text-lg md:text-xl lg:text-2xl">Filter Tanggal</h2>
        </div>
        <div class="grid grid-cols-1 xs:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
            <div class="space-y-1 sm:space-y-2">
                <label class="block text-primary font-semibold text-xs sm:text-sm">Dari Tanggal</label>
                <input type="date" id="start-date"
                    class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg sm:rounded-xl border-2 border-gray-200 bg-white text-primary focus:border-primary focus:ring-2 sm:focus:ring-4 focus:ring-primary/10 outline-none transition-all text-sm sm:text-base">
            </div>
            <div class="space-y-1 sm:space-y-2">
                <label class="block text-primary font-semibold text-xs sm:text-sm">Sampai Tanggal</label>
                <input type="date" id="end-date"
                    class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg sm:rounded-xl border-2 border-gray-200 bg-white text-primary focus:border-primary focus:ring-2 sm:focus:ring-4 focus:ring-primary/10 outline-none transition-all text-sm sm:text-base">
            </div>
            <div class="flex items-end xs:col-span-2 lg:col-span-1">
                <button id="filter-btn"
                    class="w-full bg-gradient-to-r from-primary to-green-700 text-white px-4 sm:px-6 py-2.5 sm:py-3 rounded-lg sm:rounded-xl font-semibold shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-300 text-sm sm:text-base">
                    Tampilkan Data
                </button>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div
        class="bg-white/95 backdrop-blur-sm rounded-lg sm:rounded-xl md:rounded-2xl lg:rounded-3xl shadow-xl sm:shadow-2xl border border-white/20 overflow-hidden animate-in">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[600px] sm:min-w-[700px] md:min-w-[800px]">
                <thead class="bg-gradient-to-r from-primary to-green-700">
                    <tr>
                        <th
                            class="text-left py-3 sm:py-4 px-3 sm:px-4 md:px-6 text-white font-bold font-bitter text-xs sm:text-sm md:text-base">
                            No.</th>
                        <th
                            class="text-left py-3 sm:py-4 px-3 sm:px-4 md:px-6 text-white font-bold font-bitter text-xs sm:text-sm md:text-base">
                            Tanggal</th>
                        <th
                            class="text-left py-3 sm:py-4 px-3 sm:px-4 md:px-6 text-white font-bold font-bitter text-xs sm:text-sm md:text-base">
                            Nama Customer</th>
                        <th
                            class="text-left py-3 sm:py-4 px-3 sm:px-4 md:px-6 text-white font-bold font-bitter text-xs sm:text-sm md:text-base">
                            Pembayaran</th>
                        <th
                            class="text-left py-3 sm:py-4 px-3 sm:px-4 md:px-6 text-white font-bold font-bitter text-xs sm:text-sm md:text-base">
                            Pesanan</th>
                        <th
                            class="text-left py-3 sm:py-4 px-3 sm:px-4 md:px-6 text-white font-bold font-bitter text-xs sm:text-sm md:text-base">
                            Total (Rp)</th>
                    </tr>
                </thead>
                <tbody id="table-body" class="divide-y divide-gray-100">
                    @foreach ($orders as $index => $order)
                        <tr class="hover:bg-primary/5 transition-colors">
                            <td
                                class="py-3 sm:py-4 px-3 sm:px-4 md:px-6 text-gray-700 font-medium text-xs sm:text-sm md:text-base">
                                {{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}</td>
                            <td class="py-3 sm:py-4 px-3 sm:px-4 md:px-6 text-gray-700 text-xs sm:text-sm md:text-base">
                                {{ $order->created_at->format('d-m-Y H:i:s') }}</td>
                            <td
                                class="py-3 sm:py-4 px-3 sm:px-4 md:px-6 text-gray-900 font-semibold text-xs sm:text-sm md:text-base">
                                {{ $order->customer_name }}</td>
                            <td
                                class="py-3 sm:py-4 px-3 sm:px-4 md:px-6 text-gray-900 font-semibold text-xs sm:text-sm md:text-base">
                                {{ strtoupper($order->payment_method) }}
                            </td>
                            <td class="py-3 sm:py-4 px-3 sm:px-4 md:px-6">
                                <button
                                    class="lihat-pesanan-btn inline-flex items-center gap-1.5 sm:gap-2 px-2 sm:px-3 md:px-4 py-1.5 sm:py-2 bg-primary/10 text-primary font-semibold rounded-md sm:rounded-lg hover:bg-primary hover:text-white transition-all duration-300 group text-xs sm:text-sm"
                                    data-id="{{ $order->id }}" data-order-code="{{ $order->order_code }}"
                                    data-tanggal="{{ $order->created_at->format('d-m-Y H:i:s') }}"
                                    data-customer="{{ $order->customer_name }}" data-total="{{ $order->total_amount }}">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 group-hover:scale-110 transition-transform flex-shrink-0"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                    <span class="hidden xs:inline">Lihat Detail</span>
                                    <span class="xs:hidden">Detail</span>
                                </button>
                            </td>
                            <td
                                class="py-3 sm:py-4 px-3 sm:px-4 md:px-6 text-gray-900 font-bold text-xs sm:text-sm md:text-base">
                                {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div
            class="flex flex-col sm:flex-row justify-between items-center p-4 sm:p-5 md:p-6 bg-gray-50 border-t border-gray-200">
            <div class="text-gray-600 font-medium text-xs sm:text-sm mb-3 sm:mb-0">
                Menampilkan <span class="text-primary font-bold">{{ $orders->firstItem() ?? 0 }} -
                    {{ $orders->lastItem() ?? 0 }}</span> dari <span
                    class="text-primary font-bold">{{ $orders->total() }}</span> data
            </div>
            <div class="flex items-center gap-1 sm:gap-2">
                {{ $orders->onEachSide(1)->links() }}
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

                        // 🔥 tombol cek struk diarahkan ke halaman struk transaksi
                        document.getElementById('btn-struk').href = `/orders/${id}/struk`;

                        const daftarPesanan = document.getElementById('daftar-pesanan');
                        daftarPesanan.innerHTML = '';

                        data.items.forEach(item => {
                            const itemElement = document.createElement('div');
                            itemElement.className =
                                'flex justify-between items-center py-2 sm:py-3 px-3 sm:px-4 bg-white rounded-lg sm:rounded-xl border border-gray-100 hover:border-primary/30 transition-colors';
                            itemElement.innerHTML = `
                    <div>
                        <p class="text-gray-900 font-semibold text-sm sm:text-base">${item.name}</p>
                        <p class="text-gray-600 text-xs sm:text-sm mt-0.5 sm:mt-1">${item.quantity} × Rp ${parseInt(item.price).toLocaleString('id-ID')}</p>
                    </div>
                    <p class="text-primary font-bold text-base sm:text-lg">Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</p>
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
