<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
use App\Services\TourService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
        return view('admin.tours.index', compact('tours'));
    }

    public function show($id): View
    {
        $tour = $this->tourService->getTourById($id);
        return view('admin.tours.show', compact('tour'));
    }

    public function create(): View
    {
        return view('admin.tours.create');
    }

    public function store(TourRequest $request) : RedirectResponse
    {
        $this->tourService->createTour($request->validated());
        return redirect()->route('admin.tours.index')->with('success', 'Tour created successfully');
    }


    public function edit($id): View
    {
        $tour = $this->tourService->getTourById($id);
        return view('admin.tours.edit', compact('tour'));
    }

    public function update(TourRequest $request, $id): RedirectResponse
    {
        $this->tourService->updateTour($id, $request->validated());
        return redirect()->route('admin.tours.index')->with('success', 'Tour updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $this->tourService->deleteTour($id);
        return redirect()->route('admin.tours.index')->with('success', 'Tour deleted successfully');
    }
}
