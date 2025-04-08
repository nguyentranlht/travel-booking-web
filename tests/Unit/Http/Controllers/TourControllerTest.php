<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use App\Http\Controllers\TourController;
use App\Services\TourService;
use Illuminate\Contracts\View\View;
use Mockery;

class TourControllerTest extends TestCase
{
    protected $tourService;
    protected $tourController;

    public function setUp(): void
    {
        parent::setUp();
        
        $this->tourService = Mockery::mock(TourService::class);
        $this->tourController = new TourController($this->tourService);
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_index_returns_view_with_tours()
    {
        // Arrange
        $tours = [
            ['id' => 1, 'name' => 'Tour 1'],
            ['id' => 2, 'name' => 'Tour 2']
        ];
        
        $this->tourService->shouldReceive('getAllTours')
            ->once()
            ->andReturn($tours);

        // Act
        $response = $this->tourController->index();

        // Assert
        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('tours.index', $response->name());
        $this->assertEquals($tours, $response->getData()['tours']);
    }

    public function test_show_returns_view_with_tour()
    {
        // Arrange
        $tourId = 1;
        $tour = ['id' => 1, 'name' => 'Test Tour'];
        
        $this->tourService->shouldReceive('getTourById')
            ->with($tourId)
            ->once()
            ->andReturn($tour);

        // Act
        $response = $this->tourController->show($tourId);

        // Assert
        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('tours.show', $response->name());
        $this->assertEquals($tour, $response->getData()['tour']);
    }
} 