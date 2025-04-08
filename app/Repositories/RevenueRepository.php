<?php

namespace App\Repositories;

use App\Models\Booking;

class RevenueRepository
{
    public function getTotalRevenue(): float
    {
        return Booking::sum('total_amount');
    }

    public function getRevenueByMonth(int $year): array
    {
        return Booking::selectRaw('MONTH(created_at) as month, SUM(total_amount) as revenue')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->toArray();
    }
}