<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\RevenueService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    protected $revenueService;

    public function __construct(RevenueService $revenueService)
    {
        $this->revenueService = $revenueService;
    }

    public function index(Request $request)
    {
        $year = $request->get('year', now()->year);
        $totalRevenue = $this->revenueService->getTotalRevenue();
        $monthlyRevenue = $this->revenueService->getMonthlyRevenue($year);

        return view('admin.dashboard', compact('totalRevenue', 'monthlyRevenue', 'year'));
    }
}
