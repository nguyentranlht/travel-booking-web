<?php

namespace App\View\Components;

use App\Models\Tour;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class LikeButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $tour;

    public function __construct(Tour $tour)
    {
        $this->tour = $tour;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.like-button');
    }
}
