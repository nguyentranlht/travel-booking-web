<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use App\Services\TourService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    protected $paymentService;
    protected $tourService;

    public function __construct(PaymentService $paymentService, TourService $tourService)
    {
        $this->paymentService = $paymentService;
        $this->tourService = $tourService;
    }

    public function checkout(Request $request, $tourId)
    {
        $userId = Auth::id();
        $tour = $this->tourService->getTourById($tourId);
        $guestCount = $request->guest_count;

        if($guestCount > $tour->available_seats) {
            return redirect()->back()->with('error','Not enough available seats!');
        }

        $checkoutUrl = $this->paymentService->createCheckoutSession($tourId, $userId, $guestCount);

        return redirect($checkoutUrl);
    }

    public function success(Request $request)
    {
        $bookingId = $this->paymentService->handlePaymentSuccess($request->tour_id, $request->user_id, $request->guest_count);

        return view('payments.success', [
            'bookingId' => $bookingId,
            'success' => 'Thanh toán thành công! Booking đã được tạo.',
        ]);
    }

    public function cancel()
    {
        return view('payments.cancel')->with('error', 'Thanh toán bị hủy!');
    }
}
