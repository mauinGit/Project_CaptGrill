<x-filament-widgets::widget>
    <x-filament::section>
        <div class="max-w-2xl mx-auto">

            <!-- Period Card -->
            <x-filament::card class="mb-6">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 mt-1">
                        <div
                            class="w-10 h-10 bg-info-100 dark:bg-info-500/20 rounded-lg flex items-center justify-center">
                            <x-filament::icon icon="heroicon-o-calendar-days"
                                class="w-5 h-5 text-info-600 dark:text-info-400" />
                        </div>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-950 dark:text-white mb-2">
                        Export Laporan Absensi
                    </h2>

                    <div class="flex-1">
                        <div class="flex items-center gap-2 mt-3">
                            <x-filament::badge color="info" size="sm">
                                Hari ke-{{ now()->day }}
                            </x-filament::badge>
                        </div>
                    </div>
                </div>
            </x-filament::card>

            <!-- Export Button -->
            <div class="text-center">
                <x-filament::button tag="a" href="#" size="lg" color="primary"
                    icon="heroicon-o-arrow-down-tray" icon-position="before" class="w-full sm:w-auto">
                    Download Laporan Absensi
                </x-filament::button>

                <p class="text-xs text-gray-500 dark:text-gray-400 mt-4 flex items-center justify-center gap-1">
                    Laporan mencakup data kehadiran, keterlambatan, dan izin karyawan
                </p>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
