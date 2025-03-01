<?php

namespace App\Http\Controllers;

use App\Http\Requests\TourRequest;
use App\Services\TourService;

class TourController extends Controller
{
    protected $tourService;

    public function __construct(TourService $tourService)
    {
        $this->tourService = $tourService;
    }

    public function index()
    {
        $tours = $this->tourService->getAllTours();
        return view('tours.index', compact('tours'));
    }

    public function show($id)
    {
        $tour = $this->tourService->getTourById($id);
        return view('tours.show', compact('tour'));
    }

    public function create()
    {
        return view('tours.create');
    }

    public function store(TourRequest $request)
    {
        $this->tourService->createTour($request->validated());
        return redirect()->route('tours.index')->with('success', 'Tour created successfully');
    }


    public function edit($id)
    {
        $tour = $this->tourService->getTourById($id);
        return view('tours.edit', compact('tour'));
    }

    public function update(TourRequest $request, $id)
    {
        $this->tourService->updateTour($id, $request->validated());
        return redirect()->route('tours.index')->with('success', 'Tour updated successfully');
    }

    public function destroy($id)
    {
        $this->tourService->deleteTour($id);
        return redirect()->route('tours.index')->with('success', 'Tour deleted successfully');
    }
}
