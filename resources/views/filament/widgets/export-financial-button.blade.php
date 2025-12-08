<x-filament::section>
    <div class="max-w-2xl mx-auto">
        <!-- Period Card -->
        <x-filament::card class="mb-6">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 mt-1">
                    <div
                        class="w-10 h-10 bg-primary-100 dark:bg-primary-500/20 rounded-lg flex items-center justify-center">
                        <x-filament::icon icon="heroicon-o-calendar"
                            class="w-5 h-5 text-primary-600 dark:text-primary-400" />
                    </div>
                </div>

                <h2 class="text-2xl font-bold text-gray-950 dark:text-white mb-2">
                    Export Laporan Keuangan
                </h2>

                <div class="flex-1">
                    <span class="text-xs text-gray-500 dark:text-gray-400">
                        <x-filament::badge color="success" size="sm">
                            Hari ke-{{ now()->day }}
                        </x-filament::badge>
                    </span>
                </div>
            </div>
        </x-filament::card>

        <!-- Export Button -->
        <div class="text-center">
            <x-filament::button tag="a"
                href="{{ route('financial-report.excel', ['start' => now()->startOfMonth()->toDateString(), 'end' => now()->toDateString()]) }}"
                size="lg" color="success" icon="heroicon-o-document-arrow-down" icon-position="before"
                class="w-full sm:w-auto">
                Download Laporan Excel
            </x-filament::button>

            <p class="text-xs text-gray-500 dark:text-gray-400 mt-4 flex items-center justify-center gap-1">
                File akan diunduh secara otomatis setelah tombol diklik
            </p>
        </div>
    </div>
</x-filament::section>
