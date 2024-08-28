<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    protected $dashboardService;
    //
    public function __construct()
    {
        $this->dashboardService = new DashboardService;
    }

    public function index()
    {
        $kasMasuk   = $this->dashboardService->getKasMasuk();
        $kasKeluar  = $this->dashboardService->getKasKeluar();
        $totalKas   = $this->dashboardService->getTotalKas();

        return view('landing', compact('kasMasuk', 'kasKeluar', 'totalKas'));
    }
}
