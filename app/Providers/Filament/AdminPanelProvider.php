<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Sky,
            ])
            ->brandLogo(asset('img/logo.jpg'))
            ->brandLogoHeight('2rem')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->navigationItems([
                // NavigationItem::make('Input Data Pribadi dan Keluarga')
                //     ->icon('heroicon-o-users')
                //     ->group('Penduduk')
                //     ->sort(1),
                NavigationItem::make('Pendataan Kendaaraan Warga')
                    ->icon('heroicon-o-truck')
                    ->group('Penduduk')
                    ->sort(3),
                NavigationItem::make('Pendataan Tamu Warga')
                    ->icon('heroicon-o-identification')
                    ->group('Penduduk')
                    ->sort(4),
                NavigationItem::make('Pendataan Warga Pindah Alamat')
                    ->icon('heroicon-o-home-modern')
                    ->group('Penduduk')
                    ->sort(5),
                NavigationItem::make('Pendataan Warga Meninggal')
                    ->icon('heroicon-o-user-circle')
                    ->group('Penduduk')
                    ->sort(6),
                NavigationItem::make('Data Pengurus')
                    ->icon('heroicon-o-user')
                    ->group('Pengurus')
                    ->sort(2),
                NavigationItem::make('History Pengurus')
                    ->icon('heroicon-o-folder-arrow-down')
                    ->group('Pengurus')
                    ->sort(2),
                NavigationItem::make('Surat Keterangan Domisili')
                    ->icon('heroicon-o-document-text')
                    ->group('Permohonan Surat Keterangan')
                    ->sort(3),
                NavigationItem::make('Surat Pengantar')
                    ->icon('heroicon-o-document-duplicate')
                    ->group('Permohonan Surat Keterangan')
                    ->sort(3),
                NavigationItem::make('Surat Tanda Terima')
                    ->icon('heroicon-o-document-check')
                    ->group('Permohonan Surat Keterangan')
                    ->sort(3),
                NavigationItem::make('Surat Keterangan Lainnya')
                    ->icon('heroicon-o-clipboard-document')
                    ->group('Permohonan Surat Keterangan')
                    ->sort(3),
                NavigationItem::make('Parameter')
                    ->icon('heroicon-o-ellipsis-horizontal-circle')
                    ->group('Parameter')
                    ->sort(4),
                NavigationItem::make('Upload Bukti Pengeluaran')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->group('Keuangan Flamboyan Loka')
                    ->sort(5),
                NavigationItem::make('Rekapitulasi Iuran Bulanan')
                    ->icon('heroicon-o-bookmark-square')
                    ->group('Keuangan Flamboyan Loka')
                    ->sort(5),
                NavigationItem::make('Laporan Tunggakan Iuran Bulanan')
                    ->icon('heroicon-o-document-magnifying-glass')
                    ->group('Keuangan Flamboyan Loka')
                    ->sort(5),
                NavigationItem::make('Kas Masuk dan Kas Keluar')
                    ->icon('heroicon-o-currency-dollar')
                    ->group('Keuangan Flamboyan Loka')
                    ->sort(5),
                NavigationItem::make('Laporan Bulanan')
                    ->icon('heroicon-o-presentation-chart-line')
                    ->group('Keuangan Flamboyan Loka')
                    ->sort(5),
                NavigationItem::make('Data Security')
                    ->icon('heroicon-o-shield-check')
                    ->group('Security')
                    ->sort(6),
                NavigationItem::make('Berita Flamboyan Loka')
                    ->icon('heroicon-o-radio')
                    ->group('Info Flamboyan')
                    ->sort(7),
                NavigationItem::make('Agenda Flamboyan Loka')
                    ->icon('heroicon-o-clipboard-document-check')
                    ->group('Info Flamboyan')
                    ->sort(7),
                NavigationItem::make('Pengaduan Keluhan')
                    ->icon('heroicon-o-rss')
                    ->group('Aduan Online')
                    ->sort(8),
                NavigationItem::make('Kritik dan Saran')
                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                    ->group('Aduan Online')
                    ->sort(8),
            ])
            ->sidebarCollapsibleOnDesktop();
    }
}
