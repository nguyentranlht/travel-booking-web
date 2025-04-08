<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Http\Controllers\BookingController;
use App\Services\BookingService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Mockery;

class BookingControllerTest extends TestCase
{
    protected $bookingService;
    protected $bookingController;

    public function setUp(): void
    {
        parent::setUp();
        
        $this->bookingService = Mockery::mock(BookingService::class);
        $this->bookingController = new BookingController($this->bookingService);
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_index_returns_view_with_bookings()
    {
        // Arrange
        $userId = 1;
        $bookings = ['booking1', 'booking2'];
        
        Auth::shouldReceive('id')->once()->andReturn($userId);
        $this->bookingService->shouldReceive('getUserBookings')
            ->with($userId)
            ->once()
            ->andReturn($bookings);

        // Act
        $response = $this->bookingController->index();

        // Assert
        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('bookings.index', $response->name());
        $this->assertEquals($bookings, $response->getData()['bookings']);
    }

    public function test_show_returns_view_with_booking()
    {
        // Arrange
        $bookingId = 1;
        $booking = ['id' => 1, 'name' => 'Test Booking'];
        
        $this->bookingService->shouldReceive('getBooking')
            ->with($bookingId)
            ->once()
            ->andReturn($booking);

        // Act
        $response = $this->bookingController->show($bookingId);

        // Assert
        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('bookings.show', $response->name());
        $this->assertEquals($booking, $response->getData()['booking']);
    }
} 