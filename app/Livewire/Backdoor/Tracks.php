<?php

namespace App\Livewire\Backdoor;

use App\Models\Track;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.backdoor') ]
class Tracks extends Component
{
    use WithPagination;

    public function render()
    {
        $tracks = Track::orderBy(track::ID, 'desc')->paginate(6);
        return view('livewire.backdoor.tracks', compact('tracks'));
    }
}
