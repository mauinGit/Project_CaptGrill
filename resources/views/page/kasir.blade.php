@extends('layouts.app')

@section('title', 'Kasir - CAPT.grill')

@section('content')

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
                    Kasir</h1>
                <p class="text-gray-600 text-xs sm:text-sm md:text-base mt-0.5 sm:mt-1">Harap Mengisi dengan Benar
                </p>
            </div>
        </div>
    </div>


    <!-- Filter Section -->
    <div
        class="bg-white/95 backdrop-blur-sm rounded-lg sm:rounded-xl md:rounded-2xl lg:rounded-3xl p-4 sm:p-5 md:p-6 lg:p-8 shadow-xl sm:shadow-2xl border border-white/20 animate-in">

        <div class="flex items-center gap-2 sm:gap-3">
            <div class="bg-primary/10 p-2 sm:p-2.5 rounded-lg sm:rounded-xl">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                    </path>
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

            <p class="text-primary font-extrabold text-xl sm:text-2xl md:text-3xl">
                Hari ini: {{ $dayName }}, {{ now()->format('d') }} {{ $monthName }} {{ now()->format('Y') }}
            </p>
        </div>
    </div>



    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            {{-- Makanan --}}
            <div>
                <h2 class="bg-white/95 backdrop-blur-sm rounded-[12px] flex items-center gap-3 mb-4">
                    <div class="p-3 rounded-xl shadow-sm">
                        <span class="text-2xl">🍽️</span>
                    </div>
                    <span class="text-primary font-bold text-2xl sm:text-3xl tracking-tight">
                        Makanan
                    </span>
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4">
                    @foreach ($makanan as $item)
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition transform hover:scale-[1.02] cursor-pointer p-3 flex flex-col"
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

            {{-- Minuman --}}
            <div>
                <h2 class="bg-white/95 backdrop-blur-sm rounded-[12px] flex items-center gap-3 mb-4">
                    <div class="p-3 rounded-xl shadow-sm">
                        <span class="text-2xl">🥤</span>
                    </div>
                    <span class="text-primary font-bold text-2xl sm:text-3xl tracking-tight">
                        Minuman
                    </span>
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4">
                    @foreach ($minuman as $item)
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition transform hover:scale-[1.02] cursor-pointer p-3 flex flex-col"
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

        <div class="bg-white rounded-2xl shadow-xl p-4 sm:p-5 flex flex-col">
            <h2 class="text-lg font-semibold text-gray-800 mb-3">🧺 Keranjang</h2>

            <div id="cart-empty" class="text-gray-400 text-sm text-center py-6">
                Belum ada item yang dipilih
            </div>

            <div id="cart-items" class="space-y-3 max-h-72 overflow-y-auto hidden">
                {{-- item keranjang dirender via JS --}}
            </div>

            <div class="border-t mt-4 pt-4 space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Subtotal</span>
                    <span id="subtotal-text" class="font-semibold">Rp 0</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Total</span>
                    <span id="total-text" class="font-bold text-primary text-lg">Rp 0</span>
                </div>
            </div>

            {{-- FORM INFO PEMBAYARAN --}}
            <div class="mt-4 space-y-3 text-sm">
                <div>
                    <label class="block text-gray-700 mb-1">Nama Pelanggan (opsional)</label>
                    <input type="text" id="customer_name"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-primary focus:border-primary">
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Metode Pembayaran</label>
                    <select id="payment_method"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-primary focus:border-primary">
                        @foreach ($paymentMethods as $method)
                            <option value="{{ $method }}">{{ strtoupper($method) }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Uang Diterima</label>
                    <input type="number" id="cash_given"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-primary focus:border-primary" min="0"
                        value="0">
                </div>

                <div>
                    <label class="block text-gray-700 mb-1">Kembalian</label>
                    <input type="text" id="change_amount" class="w-full border rounded-lg px-3 py-2 bg-gray-100"
                        readonly>
                </div>
            </div>

            <button id="btn-proses"
                class="mt-4 w-full bg-gradient-to-r from-primary to-green-700 text-white py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:scale-[1.02] transition disabled:opacity-60 disabled:cursor-not-allowed">
                Proses & Cetak Struk
            </button>
        </div>

        <div id="confirm-modal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-xl p-6 w-96">
                <h2 class="text-lg font-bold mb-3">Konfirmasi Pesanan</h2>

                <div id="confirm-items" class="space-y-1 text-sm mb-3"></div>

                <p class="text-sm"><b>Total:</b> <span id="confirm-total"></span></p>
                <p class="text-sm"><b>Uang diterima:</b> <span id="confirm-cash"></span></p>
                <p class="text-sm mb-4"><b>Kembalian:</b> <span id="confirm-change"></span></p>

                <div class="flex justify-end gap-2">
                    <button id="cancel-btn" class="px-3 py-1 rounded bg-gray-300">Batal</button>
                    <button id="confirm-btn" class="px-3 py-1 rounded bg-green-600 text-white">Konfirmasi</button>
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

        function renderCart() {
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
                    div.className = 'flex items-center justify-between bg-gray-50 rounded-xl px-3 py-2';

                    div.innerHTML = `
                <div class="flex-1">
                    <p class="font-semibold text-sm text-gray-900">${item.name}</p>
                    <p class="text-xs text-gray-500">${item.quantity} x ${formatRupiah(item.price)}</p>
                </div>
                <div class="flex items-center gap-2">
                    <input type="number" min="1" value="${item.quantity}"
                        class="w-14 border rounded-lg px-1 py-1 text-sm"
                        onchange="updateQty(${index}, this.value)">
                    <p class="font-semibold text-sm text-primary">${formatRupiah(item.quantity * item.price)}</p>
                    <button class="text-red-500 text-xs" onclick="removeItem(${index})">✕</button>
                </div>
            `;

                    cartItemsDiv.appendChild(div);
                });
            }

            updateTotal();
        }

        function updateTotal() {
            let subtotal = 0;
            cart.forEach(item => subtotal += item.price * item.quantity);

            document.getElementById('subtotal-text').textContent = formatRupiah(subtotal);
            document.getElementById('total-text').textContent = formatRupiah(subtotal);

            const cash = Number(document.getElementById('cash_given').value || 0);
            const change = Math.max(cash - subtotal, 0);
            document.getElementById('change_amount').value = formatRupiah(change);

            document.getElementById('btn-proses').disabled = (cart.length === 0 || subtotal === 0);
        }

        function addToCart(id, name, price) {
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
            const qty = Number(value);
            if (qty <= 0) return;
            cart[index].quantity = qty;
            renderCart();
        }

        function removeItem(index) {
            cart.splice(index, 1);
            renderCart();
        }

        document.getElementById('cash_given').addEventListener('input', () => {
            updateTotal();
        });

        /* ===============================
           BUTTON PROSES -> HANYA TAMPILKAN POPUP
        =================================*/
        document.getElementById('btn-proses').addEventListener('click', () => {
            if (cart.length === 0) {
                alert('Keranjang masih kosong');
                return;
            }

            let subtotal = 0;
            cart.forEach(item => subtotal += item.price * item.quantity);

            const customer_name = document.getElementById('customer_name').value;
            const payment_method = document.getElementById('payment_method').value;
            const cash_given = Number(document.getElementById('cash_given').value || 0);
            const change_amount = Math.max(cash_given - subtotal, 0);

            // Tampilkan ke modal
            let html = '';
            cart.forEach(item => {
                html +=
                    `<p>${item.quantity} x ${item.name} = ${formatRupiah(item.price * item.quantity)}</p>`;
            });

            document.getElementById('confirm-items').innerHTML = html;
            document.getElementById('confirm-total').textContent = formatRupiah(subtotal);
            document.getElementById('confirm-cash').textContent = formatRupiah(cash_given);
            document.getElementById('confirm-change').textContent = formatRupiah(change_amount);

            document.getElementById('confirm-modal').classList.remove('hidden');
        });

        /* ===============================
           BUTTON CONFIRM -> KIRIM KE DB
        =================================*/
        document.getElementById('confirm-btn').addEventListener('click', () => {

            let subtotal = 0;
            cart.forEach(item => subtotal += item.price * item.quantity);

            const payload = {
                customer_name: document.getElementById('customer_name').value,
                payment_method: document.getElementById('payment_method').value,
                cash_given: Number(document.getElementById('cash_given').value || 0),
                change_amount: Math.max(Number(document.getElementById('cash_given').value || 0) - subtotal, 0),
                items: cart.map(item => ({
                    id: item.id,
                    quantity: item.quantity
                }))
            };

            fetch('{{ route('kasir.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {
                    alert('Pesanan berhasil disimpan!');
                    location.reload();
                });
        });

        document.getElementById('cancel-btn').addEventListener('click', () => {
            document.getElementById('confirm-modal').classList.add('hidden');
        });

        // init
        renderCart();
    </script>
@endsection
