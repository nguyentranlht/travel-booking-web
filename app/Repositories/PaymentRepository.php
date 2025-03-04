<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository
{
    public function create(array $data)
    {
        return Payment::create($data);
    }

    public function findByPaymentId($paymentId)
    {
        return Payment::where('id', $paymentId)->first();
    }

    public function updateStatus($paymentId, $status)
    {
        return Payment::where('id', $paymentId)->update(['status' => $status]);
    }
}
