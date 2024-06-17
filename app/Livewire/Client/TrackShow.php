<?php

namespace App\Livewire\Client;

use App\Interfaces\TrackWidgetsInterface;
use App\Models\Comment;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app') ]
class TrackShow extends Component
{
    public Track $track;

    public Collection $related;

    public function mount(Track $track)
    {
        $track->load('genres');
        $this->track    = $track;
        $this->related  = Track::where('id', '!=', $this->track->id)->get();
    }

    public function render()
    {
        return view('livewire.client.track-show')->title($this->track->title);
    }

    
}
