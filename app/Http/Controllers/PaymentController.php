<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function checkout($tourId)
    {
        $userId = Auth::id();
        $checkoutUrl = $this->paymentService->createCheckoutSession($tourId, $userId);

        return redirect($checkoutUrl);
    }

    public function success(Request $request)
    {
        $this->paymentService->handlePaymentSuccess($request->tour_id, $request->user_id);

        return view('payments.success')->with('success', 'Thanh toán thành công! Booking đã được tạo.');
    }

    public function cancel()
    {
        return view('payments.cancel')->with('error', 'Thanh toán bị hủy!');
    }
}
