<?php

namespace App\Livewire;

use App\Models\Rating;
use Livewire\Component;

class PostRating extends Component
{
    public $post;
    public $rating;

    public function mount($post)
    {
        $this->post = $post;
        $this->rating = auth()->user()->ratings()->where('post_id', $post->id)->value('rating') ?? 0;
    }

    public function rate($rating)
    {
        $this->rating = $rating;
        Rating::updateOrCreate(
            ['user_id' => auth()->id(), 'post_id' => $this->post->id],
            ['rating' => $this->rating]
        );

        $this->reset('rating');

        // رفرش اطلاعات پست
        return $this->post->refresh();
    }

    public function render()
    {
        return view('livewire.post-rating');
    }
}
