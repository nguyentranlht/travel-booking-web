<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use App\Models\Booking;

class BookingRepository implements IBaseRepository
{
    public function getAll()
    {
        return Booking::all();
    }

    public function findById($id)
    {
        return Booking::findOrFail($id);
    }

    public function create(array $data)
    {
        return Booking::create($data);
    }

    public function update($id, array $data)
    {
        $tour = Booking::findOrFail($id);
        $tour->update($data);
        return $tour;
    }

    public function delete($id)
    {
        return Booking::destroy($id);
    }
}
