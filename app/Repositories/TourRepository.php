<?php

namespace App\Repositories;

use App\Models\Tour;

class TourRepository implements ITourRepository
{
    public function getAll()
    {
        return Tour::all();
    }

    public function findById($id)
    {
        return Tour::findOrFail($id);
    }

    public function create(array $data)
    {
        return Tour::create($data);
    }

    public function update($id, array $data)
    {
        $tour = Tour::findOrFail($id);
        $tour->update($data);
        return $tour;
    }

    public function delete($id)
    {
        return Tour::destroy($id);
    }
}
