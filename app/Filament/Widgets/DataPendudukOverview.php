<?php

namespace App\Filament\Widgets;

use App\Services\DashboardService;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class DataPendudukOverview extends BaseWidget
{
    private $kartuKeluarga, $dashboardService, $penduduk, $lakiLaki, $perempuan;

    function __construct()
    {
        $this->dashboardService = new DashboardService;
        $this->kartuKeluarga    = $this->dashboardService->getKartuKeluarga();
        $this->penduduk         = $this->dashboardService->getPenduduk();
        $this->lakiLaki         = $this->dashboardService->getLakiLaki();
        $this->perempuan        = $this->dashboardService->getPerempuan();
    }

    protected function getStats(): array
    {
        return [
            //
            Stat::make('Data jumlah penduduk', 0)
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Data Penduduk Baru bulan ini', 0)
                ->description('7% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Data Penduduk Pindah Bulan ini', 0)
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Data Tamu Penduduk', 0)
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
