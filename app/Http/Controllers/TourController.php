<?php

namespace App\Http\Controllers;

use App\Services\TourService;
use Illuminate\Contracts\View\View;

class TourController extends Controller
{
    protected $tourService;

    public function __construct(TourService $tourService)
    {
        $this->tourService = $tourService;
    }

    public function index(): View
    {
        $tours = $this->tourService->getAllTours();
        return view('tours.index', compact('tours'));
    }

    public function show($id): View
    {
        $tour = $this->tourService->getTourById($id);
        return view('tours.show', compact('tour'));
    }
}
