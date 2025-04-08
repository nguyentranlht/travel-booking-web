<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookingService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function index() : View
    {
        $userId = Auth::id();
        $bookings = $this->bookingService->getUserBookings($userId);
        
        return view('bookings.index', compact('bookings'));
    }

    public function show($id) : View
    {
        $booking = $this->bookingService->getBooking($id);

        return view('bookings.show', compact('booking'));
    }
}