<?php

namespace App\Services;

use App\Repositories\RevenueRepository;

class RevenueService
{
    protected $revenueRepository;

    public function __construct(RevenueRepository $revenueRepository)
    {
        $this->revenueRepository = $revenueRepository;
    }

    public function getTotalRevenue(): float
    {
        return $this->revenueRepository->getTotalRevenue();
    }

    public function getMonthlyRevenue(int $year): array
    {
        return $this->revenueRepository->getRevenueByMonth($year);
    }
}