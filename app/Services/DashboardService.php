<?php

namespace App\Services;

use App\Models\KartuKeluarga;
use App\Models\KasKeluar;
use Carbon\Carbon;
use App\Models\KasMasuk;
use App\Models\Penduduk;

class DashboardService
{
    private $startOfMonth, $endOfMonth, $kasMasuk, $kasKeluar, $totalKas, $kartuKeluarga, $penduduk, $lakiLaki, $perempuan;

    public function __construct()
    {
        $this->startOfMonth     = Carbon::now()->startOfMonth();
        $this->endOfMonth       = Carbon::now()->endOfMonth();
        $this->kasMasuk         = KasMasuk::whereBetween('tanggal_masuk', [$this->startOfMonth, $this->endOfMonth])->sum('nominal');
        $this->kasKeluar        = KasKeluar::whereBetween('tanggal_keluar', [$this->startOfMonth, $this->endOfMonth])->sum('nominal');

        $this->totalKas         = KasMasuk::sum('nominal') - KasKeluar::sum('nominal');

        $this->kartuKeluarga    = KartuKeluarga::all()->count();
        $penduduk               = Penduduk::all();
        $this->penduduk         = $penduduk->count();
        $this->lakiLaki         = $penduduk->where('jenis_kelamin', 'Laki-laki')->count();
        $this->perempuan        = $penduduk->where('jenis_kelamin', 'Perempuan')->count();
    }

    public function getKasMasuk()
    {
        return $this->kasMasuk;
    }

    public function getKasKeluar()
    {
        return $this->kasKeluar;
    }

    public function getTotalKas()
    {
        return $this->totalKas;
    }

    public function getKartuKeluarga()
    {
        return $this->kartuKeluarga;
    }

    public function getPenduduk()
    {
        return $this->penduduk;
    }

    public function getLakiLaki()
    {
        return $this->lakiLaki;
    }

    public function getPerempuan()
    {
        return $this->perempuan;
    }
}
