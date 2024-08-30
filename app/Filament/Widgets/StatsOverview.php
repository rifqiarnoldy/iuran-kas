<?php

namespace App\Filament\Widgets;

use App\Models\KasMasuk;
use App\Services\DashboardService;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    private $kasMasuk, $dashboardService, $kasKeluar, $totalKas;

    function __construct()
    {
        $this->dashboardService = new DashboardService;
        $this->kasMasuk         = $this->dashboardService->getKasMasuk();
        $this->kasKeluar        = $this->dashboardService->getKasKeluar();
        $this->totalKas         = $this->dashboardService->getTotalKas();
    }

    protected function getStats(): array
    {
        return [
            //
            // Stat::make('Kas Masuk Bulan Ini', 'Rp. ' . number_format($this->kasMasuk))
            //     ->description('32k increase')
            //     ->descriptionIcon('heroicon-m-arrow-trending-up')
            //     ->color('success'),
            // Stat::make('Kas Keluar Bulan Ini', 'Rp. ' . number_format($this->kasKeluar))
            //     ->description('7% increase')
            //     ->descriptionIcon('heroicon-m-arrow-trending-down')
            //     ->color('danger'),
            // Stat::make('Total Kas', 'Rp. ' . number_format($this->totalKas))
            //     ->description('3% increase')
            //     ->descriptionIcon('heroicon-m-arrow-trending-up')
            //     ->color('success'),
        ];
    }
}
