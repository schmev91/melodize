<?php

namespace App\Livewire\Backdoor;

use App\Models\Playlist;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app') ]
class Playlists extends Component
{
    public function render()
    {
        $playlists = Playlist::orderBy(Playlist::ID, 'desc')->paginate(6);
        return view('livewire.backdoor.playlists', compact('playlists'));
    }
}
