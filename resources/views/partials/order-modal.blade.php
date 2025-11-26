<!-- Modal Detail Pesanan -->
<div id="detail-pesanan-modal" class="modal">
    <div
        class="modal-content bg-white rounded-3xl p-8 shadow-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto animate-in">
        <div class="flex justify-between items-start mb-6">
            <div class="flex items-center gap-4">
                <div class="bg-gradient-to-br from-primary to-green-700 p-3 rounded-2xl shadow-lg">
                    <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <h2 class="text-primary font-bitter font-bold text-2xl">Detail Pesanan</h2>
            </div>
            <button id="close-modal"
                class="text-gray-400 hover:text-primary transition-colors hover:rotate-90 duration-300">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div class="bg-gradient-to-br from-primary/5 to-green-700/5 rounded-2xl p-5 mb-6 space-y-2">
            <div class="flex items-center gap-2">
                <span class="text-gray-600 font-medium">No. Transaksi:</span>
                <span id="transaksi-id" class="text-primary font-bold"></span>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-gray-600 font-medium">Tanggal:</span>
                <span id="transaksi-tanggal" class="text-gray-900 font-semibold"></span>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-gray-600 font-medium">Customer:</span>
                <span id="transaksi-customer" class="text-gray-900 font-semibold"></span>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-primary font-bitter font-bold text-xl mb-4 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                    </path>
                </svg>
                Daftar Pesanan
            </h3>
            <div id="daftar-pesanan" class="space-y-3">
                <!-- Daftar pesanan akan diisi oleh JavaScript -->
            </div>
        </div>

        <div
            class="flex justify-between items-center pt-6 border-t-2 border-primary/20 bg-gradient-to-r from-primary/5 to-green-700/5 rounded-2xl px-5 py-4">
            <p class="text-primary font-bitter font-bold text-2xl">Total Pembayaran</p>
            <p id="transaksi-total" class="text-primary font-bitter font-bold text-2xl"></p>
        </div>

        <a id="btn-struk" href="#" target="_blank"
            class="bg-gradient-to-r from-green-600 to-primary text-white px-4 py-2 rounded-lg font-semibold shadow hover:shadow-lg hover:scale-[1.02] transition-all duration-300 text-sm sm:text-base">
            Cek Struk
        </a>

    </div>
</div>
