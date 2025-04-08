<?php

namespace App\Http\Controllers\TourRider;

use App\Http\Controllers\Controller;

class TourRiderController extends Controller
{
    public function index()
    {
        return view('tour_rider.dashboard');
    }
}
