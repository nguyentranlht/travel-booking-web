@extends('layouts.app')

@section('content')
    <div class="booking-container" data-aos="fade-up">

         <!-- Back Button -->
         <div class="mb-4">
            <a href="javascript:history.back()" class="btn btn-outline-primary">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
        </div>

        <!-- Booking Card -->
        <div class="booking-card shadow-lg rounded-3" data-aos="fade-up" data-aos-delay="300">
            <!-- Check-in & Check-out -->
            <div class="booking-date-section">
                <p class="booking-date"><strong>{{ \Carbon\Carbon::parse($booking->start_date)->format('D, M d') }}</strong></p>
                <span>Check-In</span>
                <div class="icon-line"></div>
                <p class="booking-date"><strong>{{ \Carbon\Carbon::parse($booking->end_date)->format('D, M d') }}</strong></p>
                <span>Check-Out</span>
            </div>

            <!-- Booking Information -->
            <div class="booking-info-section">
                <div class="booking-header">
                    <p class="user-name text-success">{{ $booking->user->name }}</p>
                    <p class="room-type">{{ $booking->tour->title }} - <span class="text-muted">{{ $booking->tour->destinations }}</span></p>
                </div>

                <div class="booking-details">
                    <div class="detail-item">
                        <i class="fa-solid fa-clock"></i>
                        <span>Check-In time</span>
                        <p>{{ $booking->tour->start_time }}</p>
                    </div>
                    <div class="detail-item">
                        <i class="fa-solid fa-clock"></i>
                        <span>Check-Out time</span>
                        <p>{{ $booking->tour->end_time }}</p>
                    </div>
                    <div class="detail-item">
                        <i class="fa-solid fa-door-closed"></i>
                        <span>Number of Guests</span>
                        <p>{{ $booking->guest_count }}</p>
                    </div>
                </div>

                <div class="booking-footer">
                    <div class="booking-id-container">
                        <p class="booking-code"><strong>Tour Id:</strong></p>
                        <p class="booking-id">{{ $booking->id }}</p>
                    </div>
                    <img src="{{ asset('build/assets/img/barcode_PNG4.png') }}" class="barcode" alt="Barcode">
                </div>
            </div>
        </div>

        <!-- Terms & Conditions -->
        <div class="booking-terms mt-5" data-aos="fade-up" data-aos-delay="400">
            <h2>Terms and Conditions</h2>
            <h3>Payments</h3>
            <ul>
                <li>If you are purchasing your ticket using a debit or credit card via the Website, we will process these payments via the automated secure common payment gateway which will be subject to fraud screening purposes.</li>
                <li>If you do not supply the correct card billing address and/or cardholder information, your booking will not be confirmed and the overall cost may increase. We reserve the right to cancel your booking if payment is declined for any reason or if you have supplied incorrect card information.</li>
                <li>Golobe may require the card holder to provide additional payment verification upon request by either submitting an online form or visiting the nearest Golobe office, or at the airport at the time of check-in. Golobe reserves the right to deny boarding or to collect a guarantee payment (in cash or from another credit card) if the card originally used for the purchase cannot be presented by the cardholder at check-in or when collecting the tickets, or in the case the original payment has been withheld or disputed by the card issuing bank. Credit card details are held in a secured environment and transferred through an internationally accepted system.</li>
            </ul>
        </div>

        <!-- Contact Section -->
        <div class="booking-contact mt-5" data-aos="fade-up" data-aos-delay="500">
            <h2>Contact Us</h2>
            <p>If you are purchasing your ticket using a debit or credit card via the Website, we will process these payments via the automated secure common payment gateway which will be subject to fraud screening purposes.</p>
            <p>If you do not supply the correct card billing address and/or cardholder information, your booking will not be confirmed and the overall cost may increase. We reserve the right to cancel your booking if payment is declined for any reason or if you have supplied incorrect card information.</p>
            <p>Goblee Group Q.C.S.C <br> Goblee Tower <br> P.O. Box 25500 <br> Doha, State of Qatar</p>
            <p>Further contact details can be found at <a href="#">goblee.com/help</a></p>
        </div>
    </div>

    <!-- AOS Script -->
    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true
        });
    </script>
@endsection
