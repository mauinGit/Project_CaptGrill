<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Riwayat Pembelian - CAPT.grill</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
    @media (max-width: 1023px) {
      .sidebar { transform: translateX(-100%); transition: transform 0.3s ease; position: fixed; height: 100vh; z-index: 40; top: 0; left: 0; }
      .sidebar.active { transform: translateX(0); }
      .overlay { display: none; position: fixed; inset: 0; background: rgba(0, 0, 0, 0.5); z-index: 30; }
      .overlay.active { display: block; }
    }
    @media (min-width: 1024px) {
      .mobile-menu-btn, .overlay, .close-btn { display: none !important; }
    }
    .modal { display: none; position: fixed; inset: 0; background: rgba(0, 0, 0, 0.6); z-index: 50; align-items: center; justify-content: center; backdrop-filter: blur(4px); }
    .modal.active { display: flex; }
    .animate-in { animation: slideUp 0.3s ease; }
    @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
  </style>
</head>

<body class="bg-gradient-to-br from-primary via-primary to-green-900 min-h-screen font-inter">
  
  <!-- Mobile Menu Button -->
  <button class="mobile-menu-btn fixed top-5 left-5 z-50 bg-secondary hover:bg-yellow-400 p-3 rounded-xl shadow-2xl transition-all duration-300 hover:scale-110">
    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
  </button>

  <!-- Overlay -->
  <div class="overlay"></div>

  <div class="flex">
    
    <!-- Sidebar -->
    <aside class="sidebar w-72 bg-gradient-to-b from-secondary to-yellow-300 shadow-2xl min-h-screen">
      
      <button class="close-btn absolute top-5 right-5 text-primary hover:text-green-800 transition-colors">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>

      <!-- Logo -->
      <div class="text-center py-8 px-6">
        <div class="bg-white/30 backdrop-blur-sm rounded-2xl p-4 inline-block">
          <img src="{{  asset('images/logo warna.png') }}" class="w-40 h-auto mx-auto" alt="CAPILogrill" />
        </div>
      </div>

      <!-- Navigation -->
      <nav class="px-4 space-y-3">
        <a href="#" class="flex items-center gap-3 px-5 py-3.5 rounded-xl text-primary font-semibold font-bitter hover:bg-white/20 backdrop-blur-sm transition-all duration-300 group">
          <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
          <span>Kasir</span>
        </a>
        <div class="flex items-center gap-3 px-5 py-3.5 rounded-xl bg-primary text-secondary font-bold font-bitter shadow-lg">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
          </svg>
          <span>Riwayat Pembelian</span>
        </div>
      </nav>
      
      <!-- Logout -->
      <div class="absolute bottom-8 left-0 right-0 px-4">
        <a href="#" class="flex items-center justify-center gap-2 px-5 py-3 rounded-xl text-primary font-semibold font-bitter hover:bg-white/20 backdrop-blur-sm transition-all duration-300 group">
          <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
          </svg>
          <span>Logout</span>
        </a>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:p-10 space-y-6">
      
      <!-- Header -->
      <div class="bg-white/95 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-white/20 animate-in">
        <div class="flex items-center gap-4">
          <div class="bg-gradient-to-br from-primary to-green-700 p-4 rounded-2xl shadow-lg">
            <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
          </div>
          <div>
            <h1 class="text-primary font-bitter font-bold text-3xl lg:text-4xl">Riwayat Pembelian</h1>
            <p class="text-gray-600 mt-1">Kelola dan pantau transaksi Anda</p>
          </div>
        </div>
      </div>

      <!-- Filter Section -->
      <div class="bg-white/95 backdrop-blur-sm rounded-3xl p-6 lg:p-8 shadow-2xl border border-white/20 animate-in">
        <div class="flex items-center gap-3 mb-6">
          <div class="bg-primary/10 p-2.5 rounded-xl">
            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
            </svg>
          </div>
          <h2 class="text-primary font-bitter font-bold text-xl lg:text-2xl">Filter Tanggal</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div class="space-y-2">
            <label class="block text-primary font-semibold text-sm">Dari Tanggal</label>
            <input type="date" id="start-date" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 bg-white text-primary focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all">
          </div>
          <div class="space-y-2">
            <label class="block text-primary font-semibold text-sm">Sampai Tanggal</label>
            <input type="date" id="end-date" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 bg-white text-primary focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all">
          </div>
          <div class="flex items-end">
            <button id="filter-btn" class="w-full bg-gradient-to-r from-primary to-green-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-300">
              Tampilkan Data
            </button>
          </div>
        </div>
      </div>

      <!-- Search & Controls -->
      <div class="bg-white/95 backdrop-blur-sm rounded-3xl p-6 shadow-2xl border border-white/20 animate-in">
        <div class="flex flex-col md:flex-row gap-4">
          <div class="flex-1">
            <div class="relative group">
              <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400 group-focus-within:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
              <input type="text" id="search-input" placeholder="Cari nama customer atau pesanan..." class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-gray-200 bg-white text-primary focus:border-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all">
            </div>
          </div>
          <div class="flex items-center gap-3 bg-gray-50 px-4 py-2 rounded-xl border-2 border-gray-200">
            <label class="text-primary font-semibold text-sm whitespace-nowrap">Tampilkan:</label>
            <select id="rows-per-page" class="bg-white text-primary px-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-primary transition-all cursor-pointer">
              <option value="5">5 baris</option>
              <option value="10" selected>10 baris</option>
              <option value="20">20 baris</option>
              <option value="50">50 baris</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Table -->
      <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/20 overflow-hidden animate-in">
        <div class="overflow-x-auto">
          <table class="w-full min-w-[800px]">
            <thead class="bg-gradient-to-r from-primary to-green-700">
              <tr>
                <th class="text-left py-4 px-6 text-white font-bold font-bitter">No.</th>
                <th class="text-left py-4 px-6 text-white font-bold font-bitter">Tanggal</th>
                <th class="text-left py-4 px-6 text-white font-bold font-bitter">Nama Customer</th>
                <th class="text-left py-4 px-6 text-white font-bold font-bitter">Pesanan</th>
                <th class="text-left py-4 px-6 text-white font-bold font-bitter">Total (Rp)</th>
              </tr>
            </thead>
            <tbody id="table-body" class="divide-y divide-gray-100">
              @foreach($orders as $index => $order)
              <tr class="hover:bg-primary/5 transition-colors">
                <td class="py-4 px-6 text-gray-700 font-medium">{{ $loop->iteration + (($orders->currentPage() - 1) * $orders->perPage()) }}</td>
                <td class="py-4 px-6 text-gray-700">{{ $order->created_at->format('d-m-Y H:i:s') }}</td>
                <td class="py-4 px-6 text-gray-900 font-semibold">{{ $order->customer_name }}</td>
                <td class="py-4 px-6">
                  <button class="lihat-pesanan-btn inline-flex items-center gap-2 px-4 py-2 bg-primary/10 text-primary font-semibold rounded-lg hover:bg-primary hover:text-white transition-all duration-300 group" 
                          data-id="{{ $order->id }}" 
                          data-order-code="{{ $order->order_code }}"
                          data-tanggal="{{ $order->created_at->format('d-m-Y H:i:s') }}"
                          data-customer="{{ $order->customer_name }}"
                          data-total="{{ $order->total_amount }}">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    Lihat Detail
                  </button>
                </td>
                <td class="py-4 px-6 text-gray-900 font-bold">{{ number_format($order->total_amount, 0, ',', '.') }}</td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr class="bg-gradient-to-r from-primary/10 to-green-700/10">
                <td class="py-4 px-6 font-bitter font-bold text-primary text-lg" colspan="4">Total Halaman Ini</td>
                <td class="py-4 px-6 font-bitter font-bold text-primary text-lg" id="page-total">
                  {{ number_format($orders->sum('total_amount'), 0, ',', '.') }}
                </td>
              </tr>
            </tfoot>
          </table>
        </div>

        <!-- Pagination -->
        <div class="flex flex-col md:flex-row justify-between items-center p-6 bg-gray-50 border-t border-gray-200">
          <div class="text-gray-600 font-medium mb-4 md:mb-0">
            Menampilkan <span class="text-primary font-bold">{{ $orders->firstItem() ?? 0 }} - {{ $orders->lastItem() ?? 0 }}</span> dari <span class="text-primary font-bold">{{ $orders->total() }}</span> data
          </div>
          <div class="flex items-center gap-2">
            {{ $orders->links() }}
          </div>
        </div>
      </div>

    </main>
  </div>

  <!-- Modal Detail Pesanan -->
  <div id="detail-pesanan-modal" class="modal">
    <div class="modal-content bg-white rounded-3xl p-8 shadow-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto animate-in">
      <div class="flex justify-between items-start mb-6">
        <div class="flex items-center gap-4">
          <div class="bg-gradient-to-br from-primary to-green-700 p-3 rounded-2xl shadow-lg">
            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
          </div>
          <h2 class="text-primary font-bitter font-bold text-2xl">Detail Pesanan</h2>
        </div>
        <button id="close-modal" class="text-gray-400 hover:text-primary transition-colors hover:rotate-90 duration-300">
          <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
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
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
          </svg>
          Daftar Pesanan
        </h3>
        <div id="daftar-pesanan" class="space-y-3">
          <!-- Daftar pesanan akan diisi oleh JavaScript -->
        </div>
      </div>
      
      <div class="flex justify-between items-center pt-6 border-t-2 border-primary/20 bg-gradient-to-r from-primary/5 to-green-700/5 rounded-2xl px-5 py-4">
        <p class="text-primary font-bitter font-bold text-2xl">Total Pembayaran</p>
        <p id="transaksi-total" class="text-primary font-bitter font-bold text-2xl"></p>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
      const sidebar = document.querySelector('.sidebar');
      const overlay = document.querySelector('.overlay');
      const closeBtn = document.querySelector('.close-btn');
      
      mobileMenuBtn.addEventListener('click', () => {
        sidebar.classList.add('active');
        overlay.classList.add('active');
      });
      
      closeBtn.addEventListener('click', () => {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
      });
      
      overlay.addEventListener('click', () => {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
      });
      
      document.querySelectorAll('.sidebar a').forEach(link => {
        link.addEventListener('click', () => {
          if (window.innerWidth < 1024) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
          }
        });
      });
      
      const modal = document.getElementById('detail-pesanan-modal');
      const closeModalBtn = document.getElementById('close-modal');
      
      closeModalBtn.addEventListener('click', () => modal.classList.remove('active'));
      modal.addEventListener('click', (e) => { if (e.target === modal) modal.classList.remove('active'); });
      
      function loadPesananData(id, orderCode, tanggal, customer, total) {
        fetch(`/orders/${id}/details`)
          .then(response => response.json())
          .then(data => {
            document.getElementById('transaksi-id').textContent = orderCode;
            document.getElementById('transaksi-tanggal').textContent = tanggal;
            document.getElementById('transaksi-customer').textContent = customer;
            document.getElementById('transaksi-total').textContent = `Rp ${parseInt(total).toLocaleString('id-ID')}`;
            
            const daftarPesanan = document.getElementById('daftar-pesanan');
            daftarPesanan.innerHTML = '';
            
            data.items.forEach(item => {
              const itemElement = document.createElement('div');
              itemElement.className = 'flex justify-between items-center py-3 px-4 bg-white rounded-xl border border-gray-100 hover:border-primary/30 transition-colors';
              itemElement.innerHTML = `
                <div>
                  <p class="text-gray-900 font-semibold">${item.name}</p>
                  <p class="text-gray-600 text-sm mt-1">${item.quantity} × Rp ${parseInt(item.price).toLocaleString('id-ID')}</p>
                </div>
                <p class="text-primary font-bold text-lg">Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</p>
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
      
      const today = new Date();
      const sevenDaysAgo = new Date();
      sevenDaysAgo.setDate(today.getDate() - 7);
      
      startDateInput.valueAsDate = sevenDaysAgo;
      endDateInput.valueAsDate = today;
      
      filterBtn.addEventListener('click', () => {
        const startDate = startDateInput.value;
        const endDate = endDateInput.value;
        
        if (!startDate || !endDate) {
          alert('Harap pilih tanggal mulai dan tanggal akhir');
          return;
        }
        
        window.location.href = `{{ route('riwayat-pembelian') }}?start_date=${startDate}&end_date=${endDate}`;
      });
    });
  </script>
</body>
</html>