<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Tour;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likedTours()
    {
        $user = Auth::user();

        // Get the tours liked by the user
        $likedTours = Tour::whereHas('likes', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->paginate(5);

        return view('likes.liked', compact('likedTours'));
    }

    public function toggleLike($tourId)
    {
        $userId = Auth::id();

        // Check if the user has already liked the tour
        $like = Like::where('user_id', $userId)->where('tour_id', $tourId)->first();

        if ($like) {
            
            Like::where('user_id', $userId)->where('tour_id', $tourId)->delete();
            return response()->json(['status' => 'unliked']);
        } else {
            
            Like::create([
                'user_id' => $userId,
                'tour_id' => $tourId
            ]);
            return response()->json(['status' => 'liked']);
        }
    }
}