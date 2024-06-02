<?php

namespace App\Livewire\Client;

use App\Models\Track;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.client') ]
class TrackShow extends Component
{
    public Track $track;

    public function mount(Track $track)
    {
        $this->track = $track;
    }

    public function render()
    {
        $related = Track::where('id', '!=', $this->track->id)->get();
        return view('livewire.client.track-show', [
            'track' => $this->track,
            ...compact('related'),
         ]);
    }
}
