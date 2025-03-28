<button class="btn like-btn {{ $tour->likes->contains('user_id', auth()->id()) ? 'liked' : '' }}" data-tour-id="{{ $tour->id }}">
    <i class="{{ $tour->likes->contains('user_id', auth()->id()) ? 'fa-solid' : 'fa-regular' }} fa-heart like-icon"></i>
</button>
