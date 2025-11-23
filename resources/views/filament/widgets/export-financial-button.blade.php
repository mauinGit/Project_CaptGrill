<x-filament::section>
    <div class="max-w-xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-4">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-green-100 rounded-full mb-3">
            </div>
            
            <h2 class="text-2xl font-bold text-gray-900 mb-1">
                Export Laporan Keuangan
            </h2>
        </div>

        <!-- Period Card -->
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg p-4 mb-4 border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-600 mb-0.5">Periode Laporan {{ now()->startOfMonth()->format('d M Y') }} — {{ now()->format('d M Y') }}</p>
                </div>
                <div class="bg-white rounded-lg p-2 shadow-sm">
                </div>
            </div>
        </div>

        <!-- Report Contents -->
        <div class="bg-white rounded-lg border border-gray-200 p-4 mb-4">
            <h3 class="text-xs font-semibold text-gray-700 uppercase tracking-wider mb-3">
                Isi Laporan
            </h3>
        </div>

        <!-- Export Button -->
        <div class="text-center">
            <x-filament::button
                tag="a"
                href="{{ route('financial-report.excel', ['start' => now()->startOfMonth()->toDateString(), 'end' => now()->toDateString()]) }}"
                size="lg"
                color="success"
                icon="heroicon-o-document-arrow-down"
                class="px-8 py-3 text-sm font-semibold shadow-lg hover:shadow-xl transition-shadow"
            >
                Download Laporan Excel
            </x-filament::button>

            <p class="text-xs text-gray-500 mt-3">
                Format: Microsoft Excel (.xlsx) • Ukuran: ~50-100 KB
            </p>
        </div>
    </div>
</x-filament::section>