<?php

namespace App\Services;

use App\Repositories\BookingRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\TourRepository;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Config;

class PaymentService
{
    protected $paymentRepository;
    protected $tourRepository;
    protected $bookingRepository;

    public function __construct(PaymentRepository $paymentRepository, TourRepository $tourRepository, BookingRepository $bookingRepository)
    {
        $this->paymentRepository = $paymentRepository;
        $this->tourRepository = $tourRepository;
        $this->bookingRepository = $bookingRepository;
        Stripe::setApiKey(Config::get('services.stripe.secret'));
    }

    public function createCheckoutSession($tourId, $userId)
    {
        $tour = $this->tourRepository->findById($tourId);

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $tour->title,
                    ],
                    'unit_amount' => $tour->price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payments.success', ['tour_id' => $tour->id, 'user_id' => $userId]),
            'cancel_url' => route('payments.cancel'),
        ]);

        return $session->url;
    }

    public function handlePaymentSuccess($tourId, $userId)
    {
        $tour = $this->tourRepository->findById($tourId);

        // Create booking
        $booking = $this->bookingRepository->create([
            'user_id' => $userId,
            'tour_id' => $tour->id,
            'start_date' => $tour->start_time,
            'end_date' => $tour->end_time,
            'total_amount' => $tour->price,
            'status' => 'confirmed',
        ]);

        // Save payment
        return $this->paymentRepository->create([
            'booking_id' => $booking->id,
            'amount' => $tour->price,
            'payment_method' => 'stripe',
            'status' => 'success',
        ]);
    }

    public function handlePaymentFailure($paymentId)
    {
    }
}
