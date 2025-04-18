<?php

namespace App\Services;

use App\Repositories\TourRepository;
use Illuminate\Support\Facades\Storage;

class TourService
{
    protected $tourRepository;

    public function __construct(TourRepository $tourRepository)
    {
        $this->tourRepository = $tourRepository;
    }

    // Get all tours
    public function getAllTours()
    {
        return $this->tourRepository->getAll();
    }

    // Get all tours
    public function getTourById($id)
    {
        return $this->tourRepository->findById($id);
    }
    
    // Create tour
    public function createTour(array $data)
    {
        if (isset($data['images'])) {
            $data['images'] = $this->uploadImages($data['images']);
        }

        return $this->tourRepository->create($data);
    }

    // Update tour
    public function updateTour($id, array $data)
    {
        $tour = $this->tourRepository->findById($id);

        // Kiểm tra nếu có ảnh mới được upload
        if (isset($data['images'])) {
            $this->deleteOldImages($tour->images);
            $data['images'] = $this->uploadImages($data['images'], $tour->images);
        } else {
            // Nếu không upload ảnh mới, giữ nguyên ảnh cũ
            $data['images'] = $tour->images;
        }
        
        return $this->tourRepository->update($id, $data);
    }

    // Delete tour
    public function deleteTour($id)
    {
        return $this->tourRepository->delete($id);
    }

    public function restoreTour($id)
    {
        return $this->tourRepository->restore($id);
    }

    public function forceDeleteTour($id)
    {
        return $this->tourRepository->forceDelete($id);
    }

    public function getAllToursWithTrashed()
    {
        return $this->tourRepository->getAllWithTrashed();
    }

    // Upload images
    private function uploadImages($images)
    {
        $uploadedPaths = [];

        foreach ($images as $image) {
            $path = $image->store('tours', 'public');
            $uploadedPaths[] = $path;
        }

        return implode(',', $uploadedPaths); // Lưu danh sách ảnh mới
    }

    private function deleteOldImages($images)
    {
        if (!$images) {
            return;
        }

        $imagePaths = explode(',', $images);
        foreach ($imagePaths as $path) {
            Storage::disk('public')->delete($path);
        }
    }
}
